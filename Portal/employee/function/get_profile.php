<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

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

  
	echo json_encode($row);


?>