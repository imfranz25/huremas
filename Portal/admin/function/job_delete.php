<?php
	include '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$code = $_POST['code'];
		$job = "DELETE FROM job WHERE id = '$id'";
		$applicant = "DELETE FROM applicant WHERE job_code = '$code'";
		if($conn->query($job) && $conn->query($applicant)){
			$_SESSION['success'] = 'Job record deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../applicant.php');
	
?>