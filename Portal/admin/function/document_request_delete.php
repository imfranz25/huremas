<?php
	include '../includes/session.php';

	if(isset($_POST['reference_id'])){
		$reference_id = trim($_POST['reference_id']);
		$sql = "DELETE FROM document_request WHERE reference_id='$reference_id' ";
		echo ($conn->query($sql))?1:0;
	}	



?>