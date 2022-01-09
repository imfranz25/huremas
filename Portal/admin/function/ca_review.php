<?php
	include '../includes/session.php';

	if(isset($_POST['reject']) || isset($_POST['approve'])){

		$reviewed_by = $user['firstname'].' '.$user['lastname'];
		$id = trim($_POST['id']);
		$notes = isset($_POST['notes']) ? trim($_POST['notes']) : '';
		$status = isset($_POST['reject'])? 'Rejected' : 'Approved';


		$sql = "UPDATE cash_advance SET status='$status', notes = '$notes',reviewed_by='$reviewed_by'  WHERE id=$id ";

	
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cash Advance proccessed successfully';
		}else{
			$_SESSION['error'] = $conn->error;
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../cash_advance.php');
?>