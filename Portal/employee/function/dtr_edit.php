<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['edit'])){
		$id = $_POST['aid'];
		$in = $_POST['timein'];
		$out = $_POST['timeout'];
		$reason = $_POST['reason'];

		
		$sql = "INSERT INTO `attendance_correction`( `attendance_id`, `req_in`, `req_out`, `status`, `reason`) VALUES ('$id','$in','$out','0','$reason') ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Request sent successfully';
		}
		


	}
	else{
		$_SESSION['error'] = 'Select attendance record to appeal first';
	}

	header('location: ../dtr.php');
?>