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
		$id=$_POST['document_id'];
		$sql="SELECT * FROM documents LEFT JOIN document_folder ON document_folder.folder_id=documents.document_folder WHERE document_id ='$id' ";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$row['document_hash']=password_hash($row['document_id'], PASSWORD_DEFAULT);
		echo json_encode($row);
	}

?>