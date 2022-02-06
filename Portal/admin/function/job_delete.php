<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$code = $_POST['code'];
		$job = "DELETE FROM job WHERE id = '$id'";
		$applicant = "DELETE FROM applicant WHERE job_code = '$code'";

		$pass = $_POST['pass'];
		$employee_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
			if($conn->query($job) && $conn->query($applicant)){
				$_SESSION['success'] = 'Job record deleted successfully';
			}
			else{
				$_SESSION['error'] = 'Connection Timeout';
			}
		}else{
			 $_SESSION['error'] = 'Incorrect Password, please try again';
		}

		
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../applicant.php');
	
?>