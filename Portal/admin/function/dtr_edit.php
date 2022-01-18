<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['aid'];
		$in = $_POST['timein'];
		$out = $_POST['timeout'];

		
		$sql = "UPDATE attendance SET time_in = '$in', time_out = '$out' WHERE id = $id ";
		
		if($conn->query($sql)){

		
		
			$title = "Your attendance record has benn updated";
			send_notif($conn, $id, $title, 'dtr.php', 'employee');

			$_SESSION['success'] = 'Attendance updated successfully';
		}
		


	}
	else{
		$_SESSION['error'] = 'Select attendance record to edit first';
	}

	header('location: ../dtr.php');
?>