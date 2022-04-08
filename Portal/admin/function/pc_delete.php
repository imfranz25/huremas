<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

    //get id
		$id = $_POST['id'];

		$sql = $conn->prepare("DELETE FROM payroll_coverage_table WHERE pay_code = ? ");
    $sql->bind_param('s',$id);

		if($sql->execute()){

      $sql = $conn->prepare("DELETE FROM payroll_summary WHERE pay_code = ? ");
      $sql->bind_param('s',$id);
			$sql->execute();

			$_SESSION['success'] = 'Payroll deleted successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../payroll_list.php');
	
?>