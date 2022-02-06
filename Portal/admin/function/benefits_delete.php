<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		$check = "SELECT *,(SELECT COUNT(*) FROM benefit_record WHERE benefit_record.benefit_id=benefits.benefit_id) AS count FROM benefits WHERE  id = '$id' ";
		$query = $conn->query($check);
		$row = $query->fetch_assoc();

		if ($row['count']==0) {
			$pass = $_POST['pass'];
			$employee_id = $user['employee_id'];
			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
				$sql = "DELETE FROM benefits WHERE id = '$id'";
				if($conn->query($sql)){
					$_SESSION['success'] = 'Benefit deleted successfully';
				}
				else{
					$_SESSION['error'] = 'Connection Timeout';
				}
			}else{
				$_SESSION['error'] = 'Incorrect Password, please try again';
			}
		}else{
		 	$_SESSION['error'] = 'Delete benefit record failed, record is currently in used';
		}

		


	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../benefits.php');
	
?>