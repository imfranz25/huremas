<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //get details
		$task = $_POST['task'];
		$employee = $_POST['employee_id'];
		$due = $_POST['due_date'];
		$description = $_POST['description'];

		$sql = $conn->prepare("INSERT INTO task (task, description, employee_id, due_date, status) VALUES (?,?,?,?,'0')");	
    $sql->bind_param('ssss',$task,$description,$employee,$due);
		
		if($sql->execute()){

      // send notif
			$title = "You have new task - Check it out";
			send_notif($conn, $employee, $title, 'tasks.php', 'employee');
			$_SESSION['success'] = 'New Task added successfully';
      
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../tasks.php');
?>