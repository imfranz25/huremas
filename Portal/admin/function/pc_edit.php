<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		
    //prepared stmt
		$sql = $conn->prepare("UPDATE payroll_coverage_table SET Sdate = ?, Edate = ?, Pdate = ? WHERE pay_code = ? ");
    $sql->bind_param('ssss',$Sdate,$Edate,$Pdate,$code);

    // get values
    $code = $_POST['id'];
    $Sdate = $_POST['Sdate'];
    $Edate = $_POST['Edate'];
    $Pdate = $_POST['pDate'];

		if($sql->execute()){
			$_SESSION['success'] = 'Payroll updated successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:../payroll_list.php');

?>