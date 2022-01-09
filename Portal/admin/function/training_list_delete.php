<?php
	include '../includes/session.php';

	if(isset($_POST['delete'])){
		$code = $_POST['code'];
		$training = "DELETE FROM training_list WHERE training_code = '$code' ";
		$record = "DELETE FROM training_record WHERE training_code = '$code' ";

		if($conn->query($training) && $conn->query($record)){
			$_SESSION['success'] = 'Training record deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	header('location: ../training_list.php');
?>