<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['delete'])){
		// initilization shit
		$id = $_POST['reference_id'];
		$sql = "DELETE FROM event_request WHERE reference_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Event Request successfully cancelled';
		}else{
			$_SESSION['error'] = 'Event Request cancellation failed';
		}
	}
	header('location: ../events.php');


?>

