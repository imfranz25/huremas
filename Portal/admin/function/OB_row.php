<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT orec.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,orec.id as oids FROM allowance orec LEFT JOIN employees e ON e.employee_id=orec.employee_id WHERE orec.id = '$id'";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>