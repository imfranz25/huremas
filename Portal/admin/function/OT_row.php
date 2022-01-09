<?php 
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT orec.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,orec.id as oids,o.overtime_name as otname,o.overtime_rate as ors FROM overtime_request orec LEFT JOIN employees e ON e.employee_id=orec.employee_id LEFT JOIN overtime o on orec.overtime_code=o.id WHERE orec.id = '$id'";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>