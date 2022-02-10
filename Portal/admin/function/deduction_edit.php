<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    //update prepared stmt
    $sql = $conn->prepare("UPDATE deduction SET deduction_name = ?, deduction_type = ?, deduction_desc = ?, deduction_vendor = ?, amount_rate = ?, deduction_limit = ?, deduction_period = ? WHERE id = ?  ");
    $sql->bind_param('sssdddsd',$name,$type,$desc,$vendor,$amount,$limit,$period,$id);

    //get values
		$id = trim($_POST['id']);
		$name = trim($_POST['name']);
		$type = trim($_POST['type']);
		$vendor = trim($_POST['vendor']);
		$amount = trim($_POST['amount']);
		$desc = trim($_POST['desc']);
		$limit = isset($_POST['limit']) ?  trim($_POST['limit']) : "0";
		$period = isset($_POST['period']) ?  trim($_POST['period']) : "None";

		//ensure default values for limit and period  if fixed 
		if ($type == "Fixed Amount") {
			 $limit ="0";
			 $period ="None";
		}

		if($sql->execute()){
			$_SESSION['success'] = 'Deduction updated successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}

	}
	else{
		$_SESSION['error'] = 'Select deduction record to edit first';
	}

	header('location: ../deduction.php');
?>