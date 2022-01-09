<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$task = $_POST['task'];
		$due = $_POST['due_date'];
		$description = $_POST['description'];
		
		$sql = "UPDATE task SET task = '$task', description = '$description', due_date = '$due' WHERE id = $id ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Task updated successfully';
		}
		else{
			$_SESSION['error'] = 'Task updated unsuccessfully';
		}


	}
	else{
		$_SESSION['error'] = 'Select task record to edit first';
	}

	header('location: ../tasks.php');
?>