<?php
	include '../includes/session.php';

	if(isset($_POST['reject']) || isset($_POST['approve'])){

		$reviewed_by = $user['firstname'].' '.$user['lastname'];
		$id = trim($_POST['id']);
		$aid = trim($_POST['aid']);

		$in = $_POST['timein'];
		$out = $_POST['timeout'];

		$status = isset($_POST['reject'])? '2' : '1';


		$sql = "UPDATE attendance_correction SET status='$status',reviewed_by='$reviewed_by' WHERE id=$id ";

	
		if($conn->query($sql)){
			if($status=='1'){
				$sql1 = "UPDATE attendance SET time_in='$in',time_out='$out' WHERE id=$aid ";
				$conn->query($sql1);

			}

			$get_id = "SELECT employee_id FROM attendance WHERE id=$aid ";
			$query = $conn->query($get_id);
			$row = $query->fetch_assoc();
			$employee_id = $row['employee_id']; 
			$title = "Your attendance correction has been evaluated";
			send_notif($conn, $employee_id, $title, 'dtr.php', 'employee');

			$_SESSION['success'] = 'Time Record Correction proccessed successfully';
		}else{
			$_SESSION['error'] = $conn->error;
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../record_correction.php');
?>