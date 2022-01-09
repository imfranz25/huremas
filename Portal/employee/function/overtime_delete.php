<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM overtime_request WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Overtime request deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Overtime request deleted unsuccessfully';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../overtime.php');
	
?>