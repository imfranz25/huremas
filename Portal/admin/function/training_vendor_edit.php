<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = trim($_POST['id']);
		$vendor_name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$contact = trim($_POST['contact']);
		$c_person = trim($_POST['c_person']);
		$exp = trim($_POST['exp']);


		$sql = "UPDATE training_vendor SET vendor_name='$vendor_name',email='$email',contact='$contact',experience='$exp',contact_person='$c_person' WHERE id = $id ";	

		if($conn->query($sql)){
			$_SESSION['success'] = 'Training vendor updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../training_vendor.php');
?>