<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$acc = $_POST['acc_id'];
		$address = $_POST['address'];
		$type = $_POST['type'];
		$details = $_POST['details'];

		//creating vendor_code
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$code = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);


		$sql = "INSERT INTO deduction_vendor (vendor_code, vendor_name,account_id,vendor_address,vendor_type,vendor_details) VALUES ('CVSUVEN$code','$name','$acc','$address','$type','$details')";	
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Vendor added successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../deduction.php');
?>