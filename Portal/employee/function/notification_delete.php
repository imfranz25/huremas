<?php 

	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM notification WHERE id = '$id' ";
		echo ($conn->query($sql))?1:0;
	}

?>