<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['edit'])){
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['reason'];
		$id = $_POST['otid'];
		
		$sql = "UPDATE `allowance` SET `date`='$date ',`start`='$start',`end`='$end',`details`='$reason' WHERE id= '$id' ";
		
		if($conn->query($sql)){

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a official business request";
			send_notif($conn, $emp_id, $title, 'official_business.php', 'admin');

			$_SESSION['success'] = 'Official Business request updated successfully';
		}
		else{
			$_SESSION['error'] = "Official Business request update failed";
		}


	}
	else{
		$_SESSION['error'] = 'Select Official Business record to edit first';
	}

	header('location: ../official_business.php');
?>