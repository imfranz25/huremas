<?php 

	include '../includes/session.php';

	if(isset($_POST['id'])){

		$emp_id = $_POST['id'];
		// $sql = "SELECT * FROM benefit_record WHERE benefit_record.employee_id = '$emp_id' ";
		// $query = $conn->query($sql);
		// $output = array();
		// while ($row = $query->fetch_assoc()) {
		// 	array_push($output,$row);
		// }
		echo json_encode($emp_id);

	}else if (isset($_POST['pid'])) {

		$emp_id = $_POST['pid'];
		$sql = "SELECT *, benefits.benefit_id AS bid, (SELECT COUNT(*) FROM benefit_record WHERE bid=benefit_record.benefit_id) AS count FROM benefits ";
		$query = $conn->query($sql);
		$output = array();

		while ($row = $query->fetch_assoc()) {
			if($row['count']==0){
				array_push($output,$row);
			}
		}
		echo json_encode($output);

	}

?>