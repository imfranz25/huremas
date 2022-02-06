<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['edit'])){
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['reason'];
		$id = $_POST['otid'];
		
		$sql = "UPDATE `overtime_request` SET `date`='$date ',`start`='$start',`end`='$end',`reason`='$reason' WHERE id= '$id' ";
		
		if($conn->query($sql)){

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a overtime request";
			send_notif($conn, $emp_id, $title, 'overtime.php', 'admin');


			$_SESSION['success'] = 'Overtime request updated successfully';
		}
		else{
			$_SESSION['error'] = "Overtime request update failed";
		}


	}
	else{
		$_SESSION['error'] = 'Select overtime record to edit first';
	}

	header('location: ../overtime.php');
?>