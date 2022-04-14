<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //get id
		$id = $_POST['id'];
    // prepared stmt and fetch values
		$sql = $conn->prepare("SELECT * FROM training_list LEFT JOIN training_course ON training_course.id=training_list.training_course LEFT JOIN training_vendor ON training_vendor.id=training_list.training_vendor WHERE training_code = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);

	}else if (isset($_POST['code'])) {
		$code = $_POST['code'];
		$_SESSION['code'] = $code;
		echo json_encode($code);
	} else {
    header('location: ../training_list.php');
  }

?>