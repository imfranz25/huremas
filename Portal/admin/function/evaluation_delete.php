<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];

		
		$job = "DELETE FROM ratings WHERE id = '$id'";
		if($conn->query($job) ){
			$_SESSION['success'] = 'Evaluation record deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../performance_eval.php?page=evaluation');
	
?>