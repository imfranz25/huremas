<?php 

	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	//sample ID
	$id =$_SESSION["id"];

	$sql = "SELECT * FROM employees 
			LEFT JOIN position ON position.id=employees.position_id 
			LEFT JOIN department_category dc ON dc.id=employees.department_id 
			LEFT JOIN employment_category ec ON ec.id=employees.category_id 
			LEFT JOIN admin ON admin.employee_id=employees.employee_id 
			WHERE employees.employee_id = '$id' ";

	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

    //		LEFT JOIN schedules ON schedules.id=employees.schedule_id 
	//$row['time_in'] =  (new Datetime($row['time_in']))->format('h:i A');
	//$row['time_out'] = (new Datetime($row['time_out']))->format('h:i A');


	echo json_encode($row);


?>