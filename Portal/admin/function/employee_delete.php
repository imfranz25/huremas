<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
    //prepare stmt delete emp
		$sql = $conn->prepare("UPDATE employees SET employee_archive=1 WHERE id = ? ");
    $sql->bind_param('s',$id);
    //get id
    $id = $_POST['id'];

		if($sql->execute()){
			$_SESSION['success'] = 'Employee archived successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	else{
		$_SESSION['error'] = 'Select an employee to continue';
	}

	header('location: ../employee.php?page=employee_list');
	
?>