<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = trim($_POST['id']);
		$name = trim($_POST['name']);
		$status = isset($_POST['status']) ? $_POST['status'] : "inactive";
		$vendor = trim($_POST['vendor']);
		$type = trim($_POST['type']);
		$amount = trim($_POST['amount']);
		$from = trim($_POST['from']);
		$to = trim($_POST['to']);
		$start = isset($_POST['start']) ? $_POST['start'] : "";
		$end = isset($_POST['end']) ? $_POST['end'] : "";
		$desc = trim($_POST['desc']);


		$sql = "UPDATE tax SET tax_name = '$name', tax_vendor = '$vendor', tax_type = '$type', tax_amount = $amount, amount_from = $from, amount_to = $to, tax_status = '$status', tax_start = '$start', tax_end = '$end', tax_desc = '$desc'  WHERE id = $id ";

	
		if($conn->query($sql)){
			$_SESSION['success'] = 'Tax record updated successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}
	}
	else{
		$_SESSION['error'] = 'Select record to edit first';
	}

	header('location: ../deduction.php');
?>