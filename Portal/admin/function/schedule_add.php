<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		$a1= date("Y");
		$a2= date("m");

		

		$result = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'huremas' AND TABLE_NAME   = 'schedules';";
		$a3 = $conn->query($result);
		$row = $a3->fetch_assoc();
		$size = $row['AUTO_INCREMENT'];

		$invID = str_pad($size, 4, '0', STR_PAD_LEFT);

		$schedcode= $a1.$a2.$invID;



		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "INSERT INTO schedules (schedcode,time_in, time_out) VALUES ('$schedcode','$time_in', '$time_out')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule added successfully ';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../schedule.php');

?>