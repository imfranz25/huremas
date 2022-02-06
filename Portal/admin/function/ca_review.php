<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['reject']) || isset($_POST['approve'])){

		$reviewed_by = $user['firstname'].' '.$user['lastname'];
		$id = trim($_POST['id']);
		$notes = isset($_POST['notes']) ? trim($_POST['notes']) : '';
		$status = isset($_POST['reject'])? 'Rejected' : 'Approved';


		$sql = "UPDATE cash_advance SET status='$status', notes = '$notes',reviewed_by='$reviewed_by'  WHERE id=$id ";

	
		if($conn->query($sql)){

			$get_id = "SELECT employee_id FROM cash_advance WHERE id = $id ";
			$query = $conn->query($get_id);
			$row = $query->fetch_assoc();
			$emp_id = $row['employee_id'];
			$title = "Your cash advance request has been ".lcfirst($status);
			send_notif($conn, $emp_id, $title, 'cash_advance.php', 'employee');

			$_SESSION['success'] = 'Cash Advance proccessed successfully';
		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../cash_advance.php');
?>