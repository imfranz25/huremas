<?php 

	//require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
	include '../includes/session.php';


	//$id =$user["employee_id"];

	$sql = "SELECT *,notification.id AS nid FROM notification LEFT JOIN employees ON employees.employee_id=notification.employee_id WHERE type = 'admin' ";

	$query = $conn->query($sql);
	$output = array();

	while($row = $query->fetch_assoc()){
		$row['date'] = (new Datetime($row['date']))->format('M d, Y');
		$row['bell'] =  ($row['open']==0)? 'text-warning': 'text-dark';
		array_push($output,$row);
	}

	echo json_encode($output);


?>