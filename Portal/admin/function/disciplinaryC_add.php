<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		
		$title = addslashes($_POST['title']);
		$cat_type = addslashes($_POST['cat_type']);
		$details = addslashes($_POST['details']);


		$sql = "INSERT INTO disciplinary_category (title, cat_type,details) VALUES ('$title', '$cat_type', '$details')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Disciplinary category added successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../disciplinary.php');

?>