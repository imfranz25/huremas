<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM deduction_employee 
		LEFT JOIN deduction ON deduction.id=deduction_employee.deduction_id
		WHERE employee_id = '$id'";

		$query = $conn->query($sql);
		$output = array();
		while ($row = $query->fetch_assoc()) {
			array_push($output,$row);
		}
		echo json_encode($output);
	}
?>