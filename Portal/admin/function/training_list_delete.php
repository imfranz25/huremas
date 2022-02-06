<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
		$code = $_POST['code'];
		$pass = $_POST['pass'];
		$employee_id = $user['employee_id'];
		$training = "DELETE FROM training_list WHERE training_code = '$code' ";
		$record = "DELETE FROM training_record WHERE training_code = '$code' ";


		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
			if($conn->query($training) && $conn->query($record)){
				$_SESSION['success'] = 'Training record deleted successfully';
			}
			else{
				$_SESSION['error'] = 'Connection Timeout';
			}
		}else{
			$_SESSION['error'] = 'Incorrect Password, please try again';
		}
	
	}
	header('location: ../training_list.php');
?>