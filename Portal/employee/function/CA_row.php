<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['id'])){

		$id = $_POST['id'];
	
		$sql = "SELECT * FROM cash_advance WHERE id=$id ";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}	
	

?>