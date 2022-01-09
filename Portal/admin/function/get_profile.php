<?php 

	include '../includes/session.php';

	//sample ID
	$id =$_SESSION["id"];

	$sql = "SELECT * FROM employees LEFT JOIN position ON position.id=employees.position_id WHERE employee_id = '$id' ";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);


?>