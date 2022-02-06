<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$sql = "SELECT *,a.id as otrid FROM allowance a  WHERE a.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}


?>

