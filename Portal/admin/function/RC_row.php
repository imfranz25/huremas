<?php 
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT ac.*,ac.id as acid,a.time_in as tin, a.time_out as tout from attendance_correction ac inner join attendance a on a.id=ac.attendance_id  WHERE ac.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>