<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    // get details
		$vendor_name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$contact = trim($_POST['contact']);
		$c_person = trim($_POST['c_person']);
		$exp = trim($_POST['exp']);

		//creating benefit_id
    $vendor_code = 'CVSUTV'.generate_id();

		$sql = $conn->prepare("INSERT INTO training_vendor (vendor_code,vendor_name,email,contact,experience,contact_person) VALUES (?,?,?,?,?,?)");	
    $sql->bind_param('ssssss',$vendor_code,$vendor_name,$email,$contact,$exp,$c_person);

		if($sql->execute()){
			$_SESSION['success'] = 'Training vendor added successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../training_vendor.php');
?>