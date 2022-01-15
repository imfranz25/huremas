<?php
	include '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		$check = "SELECT * FROM employees WHERE department_id = $id ";
		$query = $conn->query($check);
		$count = mysqli_num_rows($query);

		if ($count==0) {
			$sql = "DELETE FROM department_category WHERE id = '$id'";
			$pass = $_POST['pass'];
			$employee_id = $user['employee_id'];

			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
				if($conn->query($sql)){
					$_SESSION['success'] = 'Department deleted successfully';
				}
				else{
					$_SESSION['error'] = 'Connection Timeout';
				}
			}else{
				 $_SESSION['error'] = 'Incorrect Password, please try again';
			}


		}else{
			$_SESSION['error'] = 'Department record is currently in used';
		}

	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../position.php');
	
?>