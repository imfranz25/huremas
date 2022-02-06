<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

		$id = addslashes($_POST['id']);
		$title = addslashes($_POST['title']);
		$cat_type = addslashes($_POST['cat_type']);
		$details = addslashes($_POST['details']);


		$sql = "UPDATE disciplinary_category SET title='$title', cat_type='$cat_type', details='$details' WHERE id = '$id' ";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Disciplinary category updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../disciplinary.php');

?>