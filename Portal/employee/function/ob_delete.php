<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM allowance WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Official Business request deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Official Business request deleted unsuccessfully';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../official_business.php');
	
?>