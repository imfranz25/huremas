<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //insert vendor prepare stmt
    $sql = $conn->prepare("INSERT INTO deduction_vendor (vendor_code, vendor_name,account_id,vendor_address,vendor_type,vendor_details) VALUES (?,?,?,?,?,?)");
    $sql->bind_param('ssssss',$code,$name,$acc,$address,$type,$details);

    //get details
		$name = $_POST['name'];
		$acc = $_POST['acc_id'];
		$address = $_POST['address'];
		$type = $_POST['type'];
		$details = $_POST['details'];

		//creating vendor_code
		$code = 'CVSUVEN'.generate_id();

		if($sql->execute()){
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