<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
		$task = $_POST['task'];
		$employee = $_POST['employee_id'];
		$due = $_POST['due_date'];
		$description = $_POST['description'];

		$sql = "INSERT INTO task (task, description, employee_id, due_date, status) VALUES ('$task','$description','$employee','$due','0')";	
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'New Task added successfully';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../tasks.php');
?>