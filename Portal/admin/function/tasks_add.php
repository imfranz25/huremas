<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		$task = $_POST['task'];
		$employee = $_POST['employee_id'];
		$due = $_POST['due_date'];
		$description = $_POST['description'];

		$sql = "INSERT INTO task (task, description, employee_id, due_date, status) VALUES ('$task','$description','$employee','$due','0')";	
		
		if($conn->query($sql)){


			// $get_id = "SELECT employee_id FROM attendance_correction WHERE id=$id ";
			// $query = $conn->query($get_id);
			// $row = $query->fetch_assoc();
			// $employee_id = $row['employee_id']; 
			$title = "You have new task - Check it out";
			send_notif($conn, $employee, $title, 'tasks.php', 'employee');


			$_SESSION['success'] = 'New Task added successfully';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../tasks.php');
?>