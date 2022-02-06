<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['editprogs'])){
		$id = $_POST['pid'];
		$tid = $_POST['tid'];
		$progress = $_POST['progress'];
		$stats = 0;
		$ttask=1;
		if (isset($_POST['is_complete'])) {
			$stats = $_POST['is_complete'];
			$ttask = 2;
		}
		
		$sql = "UPDATE task_progress SET progress = '$progress', is_complete = '$stats' WHERE id = $id ";
		
		if($conn->query($sql)){
			$update = "UPDATE task SET status = '$ttask' WHERE id = $tid ";

			if($stats==1){
				$d=date("Y-m-d");
				$update = "UPDATE task SET status = '$ttask',completed = '$d' WHERE id = $tid ";
			}


			$conn->query($update);

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a task progress";
			send_notif($conn, $emp_id, $title, 'tasks.php', 'admin');

			$_SESSION['success'] = 'Progress updated successfully';
		}
		else{
			$_SESSION['error'] = 'Progress updated unsuccessfully';
		}


	}
	else{
		$_SESSION['error'] = 'Select task record to edit first';
	}

	header('location: ../tasks.php');
?>