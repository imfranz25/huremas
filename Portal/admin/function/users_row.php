<?php 
	include '../includes/session.php';

	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$sql = "SELECT a.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,a.id as aid FROM admin a inner join employees e on a.employee_id=e.employee_id WHERE a.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}


?>

