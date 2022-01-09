<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['id']) || trim($_SESSION['id']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM admin LEFT JOIN employees ON employees.employee_id=admin.employee_id WHERE admin.employee_id = '".$_SESSION['id']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

	//UPDATE TRAINING RECORD
	$update_record = $conn->prepare("UPDATE training_record SET status=? WHERE training_code = ? ");
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

?>