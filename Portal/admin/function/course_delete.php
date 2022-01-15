<?php
	include '../includes/session.php';


	$stmt = $conn->prepare("DELETE FROM training_course WHERE id = ? ");
	$stmt->bind_param("d", $delete);

	function delete($id){
		global $stmt,$delete;
		$delete = $id;
		$stmt->execute() ? $_SESSION['success'] = 'Course(s) deleted successfully' : $_SESSION['error'] = 'Connection Timeout';
	}

	if(isset($_POST['delete'])){

		// initialization shitty
		$id  = explode(',', $_POST['id']);
		$employee_id = $user['employee_id'];

		// $check = "SELECT * FROM training_list WHERE training_course = $id ";
		// $query = $conn->query($check);
		// $row = $query->fetch_assoc();
		// $count = mysqli_num_rows($row);

		if ($count==0) {
			//challenge
			$pass  = $_POST['pass'];
			if (password_verify($pass,get_password($employee_id,$conn))) {
				if (count($id) > 1) {
					//array_map('delete', $id);
				}else{
					//delete($id[0]);
				}
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

	//header('location: ../training_course.php');
	
?>