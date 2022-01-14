<?php
	include '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM benefits WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Benefit deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../benefits.php');
	
?>