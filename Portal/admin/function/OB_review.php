<?php
	include '../includes/session.php';

	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$reviewed_by = $user['firstname'].' '.$user['lastname'];
		$status = $_POST['Status'];
		$ot = $_POST['type'];
		$notes = $_POST['notes'];


		$sql = "UPDATE allowance SET status='$status',evaluated_by='$reviewed_by',cash='$ot',notes='$notes' WHERE id=$id ";

	
		if($conn->query($sql)){


			$get_id = "SELECT employee_id FROM allowance WHERE id=$id ";
			$query = $conn->query($get_id);
			$row = $query->fetch_assoc();
			$employee_id = $row['employee_id']; 
			$title = "Your official business request has been evaluated";
			send_notif($conn, $employee_id, $title, 'official_business.php', 'employee');


			$_SESSION['success'] = 'Official Business request proccessed successfully';
		}else{
			$_SESSION['error'] = $conn->error;
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../official_business.php');
?>