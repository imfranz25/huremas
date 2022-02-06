<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['emp_id_ben'])){
		$employee_id = $_POST['emp_id_ben'];
		$benefit_id = $_POST['benefit'];
		$sql = "INSERT INTO benefit_record (benefit_id,employee_id) VALUES ('$benefit_id','$employee_id')";
		echo ($conn->query($sql))?1:0;
	}

?>