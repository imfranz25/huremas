<?php 

	include '../includes/session.php';

	if(isset($_POST['id'])){
		$record_id = $_POST['id'];
		$sql = "DELETE FROM benefit_record WHERE id= $record_id ";
		echo ($conn->query($sql))?1:0;
	}

?>