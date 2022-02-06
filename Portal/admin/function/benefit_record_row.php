<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		$emp_id = $_POST['id'];
		$sql = "SELECT *,benefit_record.id AS brid, benefits.id AS bid FROM benefit_record LEFT JOIN benefits ON benefits.benefit_id=benefit_record.benefit_id WHERE benefit_record.employee_id = '$emp_id' ";
		$query = $conn->query($sql);
		$output = array();
		while ($row = $query->fetch_assoc()) {
			array_push($output,$row);
		}
		echo json_encode($output);

	}else if (isset($_POST['pid'])) {

		$emp_id = $_POST['pid'];
		$sql = "SELECT *, benefits.benefit_id AS bid, (SELECT COUNT(*) FROM benefit_record WHERE bid=benefit_record.benefit_id AND employee_id='$emp_id') AS count FROM benefits ";
		$query = $conn->query($sql);
		$output = array();

		while ($row = $query->fetch_assoc()) {
			if($row['count']==0){
				array_push($output,$row);
			}
		}
		echo json_encode($output);

	}else if (isset($_POST['bid'])) {
		$record_id = $_POST['bid'];
		$sql = "SELECT * FROM benefit_record LEFT JOIN benefits ON benefits.benefit_id=benefit_record.benefit_id WHERE benefit_record.id = $record_id ";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}

?>