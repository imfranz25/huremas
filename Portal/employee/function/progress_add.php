<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['add'])){
		$tid = $_POST['task_id'];
		$progress = $_POST['progress'];
		$stats = 0;
		$ttask=1;
		if (isset($_POST['is_complete'])) {
			$stats = $_POST['is_complete'];
			$ttask = 2;
		}

		$sql = "INSERT INTO task_progress (task_id, progress, is_complete) VALUES ('$tid','$progress','$stats')";	
		
		if($conn->query($sql)){
			$update = "UPDATE task SET status = '$ttask' WHERE id = $tid ";


			if($stats==1){
				$d=date("Y-m-d");
				$update = "UPDATE task SET status = '$ttask',completed = '$d' WHERE id = $tid ";
			}


			$conn->query($update);

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." sent a task progress";
			send_notif($conn, $emp_id, $title, 'tasks.php', 'admin');

			$_SESSION['success'] = 'New Task Progress added successfully';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../tasks.php');
?>