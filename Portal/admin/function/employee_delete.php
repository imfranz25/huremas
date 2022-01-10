<?php
	include '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "UPDATE employees SET employee_archive=1 WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee archived successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../employee.php?page=employee_list');
	
?>