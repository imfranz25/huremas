<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		$status = isset($_POST['status']) ? $_POST['status'] : "inactive";
		$name = $_POST['name'];
		$rate = $_POST['rate'];

		$sql = "INSERT INTO overtime (overtime_name, overtime_rate, status) VALUES ('$name',$rate,'$status')";	
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Overtime added successfully';
		}
		else{
			$_SESSION['error'] = "Overtime Code already exist";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../overtime_category.php');
?>