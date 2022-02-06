<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = addslashes($_POST['title']);
		$description = addslashes($_POST['description']);

		$sql = "UPDATE benefits SET description = '$description', benefit_name = '$title' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Benefit updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:../benefits.php');

?>