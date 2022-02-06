<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$Sdate = $_POST['Sdate'];
		$Edate = $_POST['Edate'];
		$Pdate = $_POST['pDate'];
		$code = $_POST['id'];

		$sql = "UPDATE payroll_coverage_table SET Sdate = '$Sdate', Edate = '$Edate', Pdate = '$Pdate' WHERE pay_code = '$code'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Payroll updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:../payroll_list.php');

?>