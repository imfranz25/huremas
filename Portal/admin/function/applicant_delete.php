<?php
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM applicant WHERE id = '$id' ";
		echo ($conn->query($sql))? 1:0;
	}
?>