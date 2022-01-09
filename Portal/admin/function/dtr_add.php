<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
		$id = $_POST['employee_id'];
		$in = $_POST['timein'];
		$out = $_POST['timeout'];

		$sql = "INSERT INTO attendance (employee_id, time_in, time_out) VALUES ('$id','$in','$out')";	
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Attendance added successfully';
		}
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../dtr.php');
?>