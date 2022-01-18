<?php 

	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");


	$id =$user["employee_id"];

	$sql = "SELECT *,notification.id AS nid FROM notification WHERE employee_id = '$id' AND type = 'employee' ORDER BY notification.date ";

	$query = $conn->query($sql);
	$output = array();

	while($row = $query->fetch_assoc()){
		$row['date'] = (new Datetime($row['date']))->format('M d, Y');
		$row['bell'] =  ($row['open']==0)? 'text-warning': 'text-dark';
		array_push($output,$row);
	}

	echo json_encode($output);


?>