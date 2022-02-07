<?php
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].$global_link.'/Database/conn.php';

	if(!isset($_SESSION['id']) || trim($_SESSION['id']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM admin LEFT JOIN employees ON employees.employee_id=admin.employee_id WHERE admin.employee_id = '".$_SESSION['id']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

	//UPDATE TRAINING RECORD
	$update_record = $conn->prepare("UPDATE training_record SET status=? WHERE training_code = ? AND (status ='On-going' OR status='Finished') ");
	$update_record->bind_param('ss',$status,$code);

	//UPDATE TRAINING 
	$update_training = $conn->prepare("UPDATE training_list SET training_status=? WHERE training_code = ? ");
	$update_training->bind_param('ss',$status_t,$code);

	$select = "SELECT * FROM training_record LEFT JOIN training_list ON training_list.training_code=training_record.training_code";
	$query = $conn->query($select);

	while ($trow=$query->fetch_assoc()) {
		$today = strtotime(date('Y-m-d'));
		$end = strtotime($trow['schedule_to']);
		$code = $trow['training_code'];

		//record
		// AUTOMATICALLY SET STATUS -> FINISH IF END DATE <= TODAY
		// AND IF STATUS IS FINISHED AND THE ADMIN EXTEND THE END DATE -> CHANGE TO ONGOING
		if ($trow['status']=='On-going') {
			if ($today>=$end) {
				$status='Finished';
				$update_record->execute();
			}
		}else if ($trow['status']=='Finished') {
			if ($today<$end) {
				$status='On-going';
				$update_record->execute();
			}
		}

		//list
		if ($today>=$end) {
			$status_t='inactive';
			$update_training->execute();
		}else{
			$status_t='active';
			$update_training->execute();
		}

	}

  // get password for challenge (deletion of records)
	function get_password($employee_id,$conn){
		$verify = "SELECT password FROM admin WHERE employee_id = '$employee_id' ";
		$query = $conn->query($verify);
		$row = $query->fetch_assoc();
		return $row['password'];
	}

  //send notifs based on role type
	function send_notif($conn, $employee_id, $title, $link, $type){
		$sql = "INSERT INTO notification (employee_id, title, link, type) VALUES ('$employee_id', '$title','$link','$type')";
		$conn->query($sql);
	}

  //generate id for references
  function generate_id(){
    $letters = '';
    $numbers = '';
    foreach (range('A', 'Z') as $char) {
        $letters .= $char;
    }
    for($i = 0; $i < 10; $i++){
      $numbers .= $i;
    }
    return substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
  }

?>