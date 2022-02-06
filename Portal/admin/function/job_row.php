<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, job.id AS jid FROM job 
		LEFT JOIN position ON position.id=job.job_position 
		LEFT JOIN department_category dc ON dc.id=job.job_dept
		WHERE job.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>