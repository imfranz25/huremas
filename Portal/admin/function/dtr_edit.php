<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['aid'];
		$in = $_POST['timein'];
		$out = $_POST['timeout'];

		
		$sql = "UPDATE attendance SET time_in = '$in', time_out = '$out' WHERE id = $id ";
		
		if($conn->query($sql)){

			$get_id = "SELECT employee_id FROM attendance WHERE id = $id ";
			$query = $conn->query($get_id);
			$row = $query->fetch_assoc();
			$employee_id = $row['employee_id']; 
			$title = "Your attendance record has been updated";
			send_notif($conn, $employee_id, $title, 'dtr.php', 'employee');

			$_SESSION['success'] = 'Attendance updated successfully';
		}
		


	}
	else{
		$_SESSION['error'] = 'Select attendance record to edit first';
	}

	header('location: ../dtr.php');
?>