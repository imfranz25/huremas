<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['add'])){
		$emp_id = $user['employee_id'];
		$date = date("Y-m-d");
		$type = $_POST['type'];
		$account = $_POST['account'];
		$amount = trim($_POST['amount']);
		$reason = trim($_POST['reason']);

		//creating referenceid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$reference_id = "CA".substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);


		$sql = "INSERT INTO cash_advance (reference_id,employee_id,req_date,ca_type,ca_reason,amount,status,ca_account) VALUES ('$reference_id','$emp_id','$date','$type','$reason','$amount','Pending','$account')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Cash Advance Request sent successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Time-out';
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../cash_advance.php');

?>