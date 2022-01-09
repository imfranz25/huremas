<?php
	include '../includes/session.php';

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$reviewed_by = $user['firstname'].' '.$user['lastname'];
		$status = $_POST['Status'];
		$ot = $_POST['type'];
		$notes = $_POST['notes'];


		$sql = "UPDATE overtime_request SET status='$status',evaluated_by='$reviewed_by',overtime_code='$ot',notes='$notes' WHERE id=$id ";

	
		if($conn->query($sql)){


			$_SESSION['success'] = 'Overtime request proccessed successfully';
		}else{
			$_SESSION['error'] = $conn->error;
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../overtime.php');
?>