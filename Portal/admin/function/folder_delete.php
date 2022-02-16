<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['archive'])){

    //archive folder prepared stmt
		$folder = $conn->prepare("UPDATE document_folder SET folder_archive=1 WHERE folder_id = ? ");
    $folder->bind_param('s',$id);
    //get id
    $id = $_POST['folder_id'];

		if ($folder->execute()) {
			$_SESSION['success'] = 'Folder archived successfully';
		}else{
			$_SESSION['error'] = 'Something went wrong';
		}
	}

	header('location: ../documents.php');

?>