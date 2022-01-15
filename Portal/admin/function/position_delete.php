<?php
	include '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];


		$check = "SELECT * FROM employees WHERE position_id = $id ";
		$query = $conn->query($check);
		$count = mysqli_num_rows($query);

		if ($count==0) {

			$pass = $_POST['pass'];
			$employee_id = $user['employee_id'];
			$sql = "DELETE FROM position WHERE id = '$id'";

			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
				if($conn->query($sql)){
					$_SESSION['success'] = 'Designation record deleted successfully';
				}
				else{
					$_SESSION['error'] = 'Connection Timeout';
				}
			}else{
				 $_SESSION['error'] = 'Incorrect Password, please try again';
			}



		}else{
			$_SESSION['error'] = 'Designation record is currently in used';
		}


		


	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../position.php');
	
?>