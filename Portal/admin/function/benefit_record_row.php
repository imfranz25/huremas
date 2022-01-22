<?php 
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$emp_id = $_POST['id'];
		$sql = "SELECT * FROM benefit_record WHERE benefit_record.employee_id = '$emp_id' ";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>