<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = trim($_POST['id']);
		$name = trim($_POST['name']);
		$type = trim($_POST['type']);
		$vendor = trim($_POST['vendor']);
		$amount = trim($_POST['amount']);
		$desc = trim($_POST['desc']);
		isset($_POST['limit']) ? $limit = trim($_POST['limit']) : $limit ="0";
		isset($_POST['period']) ? $period = trim($_POST['period']) : $period ="None";

		//ensure default values for limit and period  if fixed 
		if ($type == "Fixed Amount") {
			 $limit ="0";
			 $period ="None";
		}
		

		$sql = "UPDATE deduction SET deduction_name = '$name', deduction_type = '$type', deduction_desc = '$desc', deduction_vendor = $vendor, amount_rate = $amount, deduction_limit = $limit, deduction_period = '$period' WHERE id = $id ";

	
		if($conn->query($sql)){
			$_SESSION['success'] = 'Overtime updated successfully';
		}
		else{
			$_SESSION['error'] = "Overtime Code already exist";
		}

	}
	else{
		$_SESSION['error'] = 'Select deduction record to edit first';
	}

	header('location: ../deduction.php');
?>