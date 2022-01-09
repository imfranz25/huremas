<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){
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

		$check_att = "SELECT SUM(CASE WHEN (status = 'Finished' OR status = 'Reviewed' OR status = 'On-going') THEN 1 ELSE 0 END) AS basecount FROM training_record WHERE training_code ='$code' ";
		$query = $conn->query($check_att);
		$basecount = $query->fetch_assoc();


		$sql = "UPDATE training_list SET training_title ='$title', training_objective ='$objective', training_course=$course ,batch_size =$size ,schedule_from ='$from' ,schedule_to ='$to',training_mode ='$mode',training_details ='$details',training_duration ='$duration',training_vendor =$vendor,training_trainer ='$trainer',training_experience ='$exp' WHERE training_code ='$code' ";	

		echo json_encode($basecount['basecount']);
		if ($basecount['basecount']<=$size) {
			if($conn->query($sql)){
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