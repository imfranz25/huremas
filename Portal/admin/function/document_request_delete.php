<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['reference_id'])){

    //delete prepared stmt
		$sql = $conn->prepare("DELETE FROM document_request WHERE reference_id=? ");
    $sql->bind_param('s',$reference_id);
    //get id
    $reference_id = trim($_POST['reference_id']);

		echo ($sql->execute())?1:0;

	}else{
    header('location:../documents.php');
  }   



?>