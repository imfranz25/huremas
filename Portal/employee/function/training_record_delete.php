<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['delete'])){
		$reference_no = $_POST['id'];

		$sql = "DELETE FROM training_record WHERE reference_no = '$reference_no'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Training Request cancelled successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to cancel first';
	}

	header('location: ../training.php');
	
?>