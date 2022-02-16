<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['folder_id'])){

    //prepared stmt select
		$sql = $conn->prepare("SELECT * FROM document_folder WHERE folder_id = ? ");
    $sql->bind_param('s',$id);
    //get id
    $id = $_POST['folder_id'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);

	}else{
    header('location: ../documents.php');
  }

?>