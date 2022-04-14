<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    // get details
		$code = trim($_POST['code']);
		$title = trim($_POST['title']);
		$objective = trim($_POST['objective']);
		$course = $_POST['course'];
		$size = trim($_POST['size']);
		$from = $_POST['from'];
		$to = $_POST['to'];
		$mode = $_POST['mode'];
		$vendor = $_POST['vendor'];
		$trainer = trim($_POST['trainer']);
		$exp = trim($_POST['exp']);
		$details = trim($_POST['details']);
		$duration =abs(strtotime($to)-strtotime($from))/(60*60); //duration

		$check_att = $conn->prepare("SELECT SUM(CASE WHEN (status = 'Finished' OR status = 'Reviewed' OR status = 'On-going') THEN 1 ELSE 0 END) AS basecount FROM training_record WHERE training_code =? ");
    $check_att->bind_param('s',$code);
    $check_att->execute();
		$result = $check_att->get_result();
		$basecount = $result->fetch_assoc();


		$sql = $conn->prepare("UPDATE training_list SET training_title =?, training_objective =?, training_course=? ,batch_size =? ,schedule_from =? ,schedule_to =? ,training_mode =? ,training_details =? ,training_duration =?,training_vendor =? ,training_trainer =?,training_experience =? WHERE training_code =? ");	
    $sql->bind_param('ssddsssssdsss',$title,$objective,$course,$size,$from,$to,$mode,$details,$duration,$vendor,$trainer,$exp,$code);
    // #9 string
		// echo json_encode($basecount['basecount']);

		if ($basecount['basecount']<=$size) {
			if($sql->execute()){
				$_SESSION['success'] = 'Training updated successfully';
			}
			else{
				$_SESSION['error'] = 'Connection Timeout';
			}
		}else{
			$_SESSION['error'] = 'Opps, Unable to update training details because the specified batch size is lower than the number of attendees ('.$basecount['basecount'].').';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../training_list.php');
?>