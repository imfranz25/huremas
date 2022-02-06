<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$task = $_POST['task'];
		$due = $_POST['due_date'];
		$description = $_POST['description'];
		
		$sql = "UPDATE task SET task = '$task', description = '$description', due_date = '$due' WHERE id = $id ";
		
		if($conn->query($sql)){


			$get_id = "SELECT employee_id FROM task WHERE id=$id ";
			$query = $conn->query($get_id);
			$row = $query->fetch_assoc();
			$employee_id = $row['employee_id']; 
			$title = "Your task has been updated";
			send_notif($conn, $employee_id, $title, 'tasks.php', 'employee');



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