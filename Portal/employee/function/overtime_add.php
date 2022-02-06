<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['add'])){
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['reason'];
		$eid = $_POST['eid'];

		$sql = "INSERT INTO overtime_request (`employee_id`, `date`, `start`, `end`,`reason`,`status`) VALUES ('$eid','$date','$start','$end','$reason','0')";	
		
		if($conn->query($sql)){

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." send a overtime request";
			send_notif($conn, $emp_id, $title, 'overtime.php', 'admin');


			$_SESSION['success'] = 'Overtime request added successfully';
		}
		else{
			$_SESSION['error'] = "Overtime request failed";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../overtime.php');
?>