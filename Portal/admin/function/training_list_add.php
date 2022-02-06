<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
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

		//training code
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$code = 'CVSUTRA'.substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 7);

		$sql = "INSERT INTO training_list (training_code,training_title,training_objective,training_course,batch_size,schedule_from,schedule_to,training_mode,training_details,training_duration,training_vendor,training_trainer,training_experience,training_status) VALUES ('$code','$title','$objective',$course,$size,'$from','$to','$mode','$details','$duration',$vendor,'$trainer','$exp','active')";	


		if($conn->query($sql)){
			$_SESSION['success'] = 'Training posted successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../training_list.php');
?>