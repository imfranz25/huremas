<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$tid = $_POST['tid'];
		$stats = $_POST['stats'];
		$sql = "DELETE FROM task_progress WHERE id = '$id'";
		if($conn->query($sql)){
			if($stats==1){
				$update = "UPDATE task SET status = '1',completed = '' WHERE id = $tid ";
				$conn->query($update);
			}
			$_SESSION['success'] = 'Progress deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}


	header('location: ../tasks.php');
	
?>