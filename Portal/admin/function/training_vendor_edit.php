<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    // get details
		$id = trim($_POST['id']);
		$vendor_name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$contact = trim($_POST['contact']);
		$c_person = trim($_POST['c_person']);
		$exp = trim($_POST['exp']);

    // prepared stmt
		$sql = $conn->prepare("UPDATE training_vendor SET vendor_name=?,email=?,contact=?,experience=?,contact_person=? WHERE id = ? ");	
    $sql->bind_param('sssssd',$vendor_name,$email,$contact,$exp,$c_person,$id);

		if($sql->execute()){
			$_SESSION['success'] = 'Training vendor updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../training_vendor.php');
?>