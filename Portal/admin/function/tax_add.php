<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
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

		//tax code
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

		$sql = "INSERT INTO tax (tax_code,tax_name,tax_vendor,tax_type,tax_amount,amount_from,amount_to,tax_status,tax_start,tax_end,tax_desc) VALUES ('CVSUTAX$code','$name','$vendor','$type',$amount,$from,$to,'$status','$start','$end','$desc')";	


		if($conn->query($sql)){
			$_SESSION['success'] = 'Tax added successfully';
		}
		else{
			$_SESSION['error'] = "Connection Time Out";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../deduction.php');
?>