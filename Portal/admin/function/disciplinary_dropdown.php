<?php
include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM employees LEFT JOIN position ON position.id=employees.position_id LEFT JOIN department_category ON department_category.id=employees.department_id WHERE employee_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>