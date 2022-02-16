<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['folder_id'])){
		$_SESSION['folder_name']=$_POST['folder_id'];
		echo 1;
	}else if (isset($_POST['query'])) {
		$_SESSION['folder_name']=$_POST['f_id'];
		$_SESSION['query']=$_POST['query'];
		echo 1;
	}else if (isset($_POST['document_id'])) {

    //prepared stmt select docu by docu id
		$sql=$conn->prepare("SELECT * FROM documents LEFT JOIN document_folder ON document_folder.folder_id=documents.document_folder WHERE document_id =? ");
    $sql->bind_param('s',$id);
    //get id
    $id=$_POST['document_id'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();
		$row['document_hash']=password_hash($row['document_id'], PASSWORD_DEFAULT);
		echo json_encode($row);

	}else{
    header('location:../documents.php');
  }  

?>