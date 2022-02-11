<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
    //preapred stmt
		$sql = $conn->prepare("SELECT * FROM benefits WHERE id = ? ");
    $sql->bind_param('s',$id);
    //get id
    $id = $_POST['id'];
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);
	}else{
    header('location:../benefits.php');
  }
?>