<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
		$title = addslashes($_POST['title']);
		$rate = $_POST['code'];

		$sql = "INSERT INTO department_category (title, code) VALUES ('$title', '$rate')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Department added successfully';
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