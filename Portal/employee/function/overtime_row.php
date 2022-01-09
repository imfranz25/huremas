<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$sql = "SELECT otr.*,otr.id as otrid,o.overtime_name as otname, o.overtime_rate as otrx FROM overtime_request otr left join overtime o on o.id=otr.overtime_code WHERE otr.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}


?>

