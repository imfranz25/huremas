<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['addIn'])){
		$id = $_POST['eid'];
		$eid = $_POST['empid'];
		$sql = "INSERT INTO attendance (employee_id,time_out) VALUES ('$id',null)";	
		
		if(($id==$eid)&&($conn->query($sql))){

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." timed-in";
			send_notif($conn, $emp_id, $title, 'dtr.php', 'admin');

			$_SESSION['success'] = 'Time-in added successfully';
		}else{
		$_SESSION['error'] = 'Invalid EMployee ID';
	}
	}else if(isset($_POST['addOut'])){
		$id = $_POST['eid'];
		$eid = $_POST['empid'];
		$aids = $_POST['aid'];

		$sql = "UPDATE attendance SET time_out=current_timestamp() WHERE id='$aids'";	
		
		if(($id==$eid)&&($conn->query($sql))){

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." timed-out";
			send_notif($conn, $emp_id, $title, 'dtr.php', 'admin');

			$_SESSION['success'] = 'Time-out added successfully';
		}else{
		$_SESSION['error'] = 'Invalid EMployee ID';
	}

	}else{
		$_SESSION['error'] = 'Fillup the form first';
	}
	header('location: ../dtr.php');
?>