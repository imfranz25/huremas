<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //select prepared stmt
		$sql = $conn->prepare("SELECT * FROM training_course WHERE id = ? ");
    $sql->bind_param('s',$id);
    //get id
    $id = $_POST['id'];
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);

	}else{
    header('location: ../training_course.php');
  }
  
?>