<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //prepared stmt insert deduc
    $sql = $conn->prepare("INSERT INTO deduction (deduction_code,deduction_name,deduction_type,deduction_desc,deduction_vendor,amount_rate,deduction_limit,deduction_period) VALUES (?,?,?,?,?,?,?,?)"); 
    $sql->bind_param('ssssddds',$code,$name,$type,$desc,$vendor,$amount,$limit,$period);

    //get values
		$name = trim($_POST['name']);
		$type = trim($_POST['type']);
		$vendor = trim($_POST['vendor']);
		$amount = trim($_POST['amount']);
		$desc = trim($_POST['desc']);
		$limit = isset($_POST['limit']) ?  trim($_POST['limit']) : "0";
		$period = isset($_POST['period']) ? trim($_POST['period']) : "None";

		//ensure default values for limit and period  if fixed 
		if ($type == "Fixed Amount") {
			 $limit ="0";
			 $period ="None";
		}

		//creating deduc_code
		$code = 'CVSUDT'.generate_id();

		
		if($sql->execute()){
			$_SESSION['success'] = 'Deduction record added successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../deduction.php');
?>