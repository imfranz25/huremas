<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM cash_advance WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'CA Request cancelled successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to cancel first';
	}

	header('location: ../cash_advance.php');
	
?>