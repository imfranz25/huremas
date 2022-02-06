<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		$a1 = $_POST['employee_id'];
		$a2 = $_POST['task_id'];
		$a3 = $_POST['efficiency'];
		$a4 = $_POST['timeliness'];
		$a5 = $_POST['quality'];
		$a6 = $_POST['accuracy'];
		$a7 = $_POST['remarks'];
		$date = date('m/d/Y h:i:s a', time());

	

		$sql = "INSERT INTO ratings (`employee_id`, `task_id`, `efficiency`, `timeliness`, `quality`, `accuracy`, `remarks`) VALUES ('$a1','$a2','$a3','$a4','$a5','$a6','$a7')";
		if($conn->query($sql)){

			// $get_id = "SELECT employee_id FROM document_request WHERE reference_id = '$reply_id' ";
			// 	$query = $conn->query($get_id);
			// 	$row = $query->fetch_assoc();
			// 	$employee_id = $row['employee_id']; 
			$title = "Your task evaluation has been evaluated";
			send_notif($conn, $a1, $title, 'tasks.php', 'employee');


			$_SESSION['success'] = 'Evaluation added successfully ' ;
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../performance_eval.php?page=evaluation');
	

?>