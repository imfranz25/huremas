<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
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

		//creating deduc_code
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$code = substr(str_shuffle($letters), 0, 4).substr(str_shuffle($numbers), 0, 4);

		
		$sql = "INSERT INTO deduction (deduction_code,deduction_name,deduction_type,deduction_desc,deduction_vendor,amount_rate,deduction_limit,deduction_period) VALUES ('CVSUDT$code','$name','$type','$desc',$vendor,$amount,$limit,'$period')";	

		if($conn->query($sql)){
			$_SESSION['success'] = 'Deduction record added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../deduction.php');
?>