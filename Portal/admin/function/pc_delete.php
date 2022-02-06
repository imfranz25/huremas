<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM payroll_coverage_table WHERE pay_code = '$id'";
		if($conn->query($sql)){

			$sql = "DELETE FROM payroll_summary WHERE pay_code = '$id'";
			$conn->query($sql);

			$_SESSION['success'] = 'Payroll deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../payroll_list.php');
	
?>