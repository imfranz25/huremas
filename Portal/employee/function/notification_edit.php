<?php 

	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");


	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = "UPDATE notification SET open=1 WHERE id= $id ";
		echo ($conn->query($sql))?1:0;
	}

?>