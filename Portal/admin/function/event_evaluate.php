<?php 
	include '../includes/session.php';

	if(isset($_POST['approve'])){
		$id = $_POST['reference_id'];
		$insert = "INSERT INTO events (reference_id, event_name, display_image, event_date, event_from, event_to, event_venue)
					SELECT reference_id, event_name, display_image, event_date, event_from, event_to, event_venue
					FROM event_request WHERE reference_id = '$id' ;";
		$update = "UPDATE event_request SET request_status=1 WHERE reference_id = '$id' ";
		if ($conn->query($update) && $conn->query($insert)) {


			$get_id = "SELECT employee_id FROM event_request WHERE reference_id = '$id'";
			$query = $conn->query($get_id);
			$row = $query->fetch_assoc();
			$emp_id = $row['employee_id'];
			$title = "Your event request has been approved";
			send_notif($conn, $emp_id, $title, 'events.php', 'employee');


			$_SESSION['success'] = 'Event request approved';
		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}else if(isset($_POST['reject'])){
		$id = $_POST['reference_id'];
		$update = "UPDATE event_request SET request_status=2 WHERE reference_id = '$id' ";
		if ($conn->query($update)) {

			$get_id = "SELECT employee_id FROM event_request WHERE reference_id = '$id'";
			$query = $conn->query($get_id);
			$row = $query->fetch_assoc();
			$emp_id = $row['employee_id'];
			$title = "Your event request has been rejected";
			send_notif($conn, $emp_id, $title, 'events.php', 'employee');

			$_SESSION['success'] = 'Event request rejected';
		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	header('location: ../events.php');

?>