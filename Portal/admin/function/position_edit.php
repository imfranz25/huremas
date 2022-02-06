<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];	
		$title = addslashes($_POST['title']);
		$rate = $_POST['rate'];
		$type = $_POST['type'];
		$grade = $_POST['sslx2'];
		$step = $_POST['step2'];
		$res=1;
		if($type!='Contractual (CNT)'){
			$res=2;
		}

		$sql = "UPDATE position SET description = '$title', rate = '$rate', grade = '$grade',step ='$step', type = '$res' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Designation updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:../position.php');

?>