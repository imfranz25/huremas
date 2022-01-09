<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){

		$vendor_name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$contact = trim($_POST['contact']);
		$c_person = trim($_POST['c_person']);
		$exp = trim($_POST['exp']);

		//creating benefit_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$vendor_code = 'CVSUTV'.substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 7);


		$sql = "INSERT INTO training_vendor (vendor_code,vendor_name,email,contact,experience,contact_person) VALUES ('$vendor_code','$vendor_name','$email','$contact','$exp','$c_person')";	

		if($conn->query($sql)){
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