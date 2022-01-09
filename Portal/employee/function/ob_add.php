<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['add'])){
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['details'];
		$eid = $_POST['eid'];

		$sql = "INSERT INTO allowance (`employee_id`, `date`, `start`, `end`,`details`,`status`) VALUES ('$eid','$date','$start','$end','$reason','0')";	
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Official Business request added successfully';
		}
		else{
			$_SESSION['error'] = "Official Business request failed";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../official_business.php');
?>