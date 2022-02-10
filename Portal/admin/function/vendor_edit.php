<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    //edit prepare stmt
    $sql = $conn->prepare("UPDATE deduction_vendor SET vendor_name = ?, account_id = ?, vendor_address = ?, vendor_type = ?, vendor_details = ? WHERE id = ?  ");
    $sql->bind_param('sssssd',$name,$acc,$address,$type,$details,$id);
    
    //get values
		$id = $_POST['vendor_id'];
		$name = $_POST['name'];
		$acc = $_POST['acc_id'];
		$address = $_POST['address'];
		$type = $_POST['type'];
		$details = $_POST['details'];
		
		if($sql->execute()){
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