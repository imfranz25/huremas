<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['delete'])){

    // get id
		$reference_id = $_POST['reference_id'];

    // prepared stmt
		$sql = $conn->prepare("DELETE FROM document_request WHERE reference_id=? ");
    $sql->bind_param('s',$reference_id);

		if ($sql->execute()) {
			$_SESSION['success']='Document Request cancelled successfully';
		}else{
			$_SESSION['error']='Document Request cancel failed';
		}

	}	
  
	header('location:../documents.php');



?>