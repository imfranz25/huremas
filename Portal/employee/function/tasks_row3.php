<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$progress = $conn->query("SELECT *,p.id as pid FROM task_progress p left join task t on t.id = p.task_id where p.id = '$id'");

		$row = $progress->fetch_assoc();

		echo json_encode($row);
	}



?>

