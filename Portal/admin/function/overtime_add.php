<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

		$sql = $conn->prepare("INSERT INTO overtime (overtime_name, overtime_rate, status) VALUES (?,?,?)");	
    $sql->bind_param('sds',$name,$rate,$status);

    $status = isset($_POST['status']) ? $_POST['status'] : "inactive";
    $name = $_POST['name'];
    $rate = $_POST['rate'];
		
		if($sql->execute()){
			$_SESSION['success'] = 'Overtime added successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../overtime_category.php');
?>