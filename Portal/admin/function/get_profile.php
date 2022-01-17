<?php 

	include '../includes/session.php';

	//sample ID
	$id =$_SESSION["id"];

	$sql = "SELECT * FROM employees 
			LEFT JOIN position ON position.id=employees.position_id 
			LEFT JOIN department_category dc ON dc.id=employees.department_id 
			LEFT JOIN schedules ON schedules.id=employees.schedule_id 
			LEFT JOIN employment_category ec ON ec.id=employees.category_id 
			WHERE employee_id = '$id' ";

	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	$row['time_in'] =  (new Datetime($row['time_in']))->format('h:i A');
	$row['time_out'] = (new Datetime($row['time_out']))->format('h:i A');


	echo json_encode($row);


?>