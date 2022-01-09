<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){
		$type = $_POST['type'];
		$aid = $_POST['aid'];
		
		$sql = "UPDATE admin SET type = '$type' WHERE id = $aid ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'User record updated successfully';
		}
		else{
			$_SESSION['error'] = "User record updated unsuccessfully";
		}


	}else if(isset($_POST['reset'])){
		$aid = $_POST['aid'];

		$sql = "SELECT default_password FROM admin  WHERE id = '$aid'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$hashed_password = password_hash($row['default_password'], PASSWORD_DEFAULT);
		$sql = "UPDATE admin SET password = '$hashed_password' WHERE id = $aid ";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User password reset successfully';
		}else{
			$_SESSION['error'] = "User password reset unsuccessfully";
		}

	}
	else{
		$_SESSION['error'] = 'Select user record to edit first';
	}

	header('location: ../users.php');
?>