<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //get dtr details
		$id = $_POST['employee_id'];
		$in = $_POST['timein'];
		$out = $_POST['timeout'];

		$sql = $conn->prepare("INSERT INTO attendance (employee_id, time_in, time_out) VALUES (?,?,?)");	
    $sql->bind_param('sss',$id,$in,$out);
		
		if($sql->execute()){
			$_SESSION['success'] = 'Attendance added successfully';
		}
    
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../dtr.php');
?>