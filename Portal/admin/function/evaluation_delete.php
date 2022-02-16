<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

		//delete prepared stmt
		$job = $conn->prepare("DELETE FROM ratings WHERE id = ? ");
    $job->bind_param('s',$id);
    //get id
    $id = $_POST['id'];

		if($job->execute()){
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