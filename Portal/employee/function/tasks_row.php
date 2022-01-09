<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$sql = "SELECT *, task.id as tid FROM task left join employees e on e.employee_id=task.employee_id WHERE task.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

?>

