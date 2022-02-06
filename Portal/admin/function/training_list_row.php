<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM training_list LEFT JOIN training_course ON training_course.id=training_list.training_course LEFT JOIN training_vendor ON training_vendor.id=training_list.training_vendor WHERE training_code = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}else if (isset($_POST['code'])) {
		$code = $_POST['code'];
		$_SESSION['code'] = $code;
		echo json_encode($code);
	}

?>