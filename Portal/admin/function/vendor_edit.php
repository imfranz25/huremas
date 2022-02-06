<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['vendor_id'];
		$name = $_POST['name'];
		$acc = $_POST['acc_id'];
		$address = $_POST['address'];
		$type = $_POST['type'];
		$details = $_POST['details'];
		
		$sql = "UPDATE deduction_vendor SET vendor_name = '$name', account_id = '$acc', vendor_address = '$address', vendor_type = '$type', vendor_details = '$details' WHERE id = $id ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Vendor updated successfully';
		}
		else{
			$_SESSION['error'] = "Connection timeout";
		}


	}
	else{
		$_SESSION['error'] = 'Select vendor record to edit first';
	}

	header('location: ../deduction.php');
?>