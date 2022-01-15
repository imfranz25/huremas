<?php
	include '../includes/session.php';


	$stmt = $conn->prepare("DELETE FROM training_course WHERE id = ? ");
	$stmt->bind_param("d", $delete);

	function delete($id){
		global $stmt,$delete;
		$delete = $id;
		$stmt->execute() ? $_SESSION['success'] = 'Course deleted successfully' : $_SESSION['error'] = 'Connection Timeout';
	}

	if(isset($_POST['delete'])){

		// initialization shitty
		$id  = $_POST['id'];
		$employee_id = $user['employee_id'];

		$check = "SELECT * FROM training_list WHERE training_course = $id ";
		$query = $conn->query($check);
		$count = mysqli_num_rows($query);

		if ($count==0) {
			//challenge
			$pass  = $_POST['pass'];
			if (password_verify($pass,get_password($employee_id,$conn))) {
				delete($id);
			}else{
				 $_SESSION['error'] = 'Incorrect Password, please try again';
			}
		}else{
			$_SESSION['error'] = 'Training course currently in used';
		}
		
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../training_course.php');
	
?>