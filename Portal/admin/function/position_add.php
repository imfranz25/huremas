<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		$title = addslashes($_POST['title']);
		$rate = $_POST['rate'];
		$type = $_POST['type'];
		$grade = $_POST['sslx'];
		$step = $_POST['step'];

		$sql = "INSERT INTO position (description, rate,type,grade,step) VALUES ('$title', '$rate','$type','$grade','$step')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Designation added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../position.php');

?>