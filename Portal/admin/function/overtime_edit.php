<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['OT_id'];
		$status = isset($_POST['edit_status']) ? $_POST['edit_status'] : "inactive";
		$name = $_POST['edit_name'];
		$rate = $_POST['edit_rate'];
		
		$sql = "UPDATE overtime SET  status = '$status', overtime_name = '$name', overtime_rate = $rate WHERE id = $id ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Overtime updated successfully';
		}
		else{
			$_SESSION['error'] = "Overtime Code already exist";
		}


	}
	else{
		$_SESSION['error'] = 'Select overtime record to edit first';
	}

	header('location: ../overtime.php');
?>