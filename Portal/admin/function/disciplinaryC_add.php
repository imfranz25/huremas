<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
		$title = addslashes($_POST['title']);
		$code = addslashes($_POST['code']);
		$cat_type = addslashes($_POST['cat_type']);
		$details = addslashes($_POST['details']);


		$sql = "INSERT INTO disciplinary_category (title,code, cat_type,details) VALUES ('$title','$code', '$cat_type', '$details')";
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