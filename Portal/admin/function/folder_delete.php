<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['archive'])){

		$id = $_POST['folder_id'];

		$folder = "UPDATE document_folder SET folder_archive=1 WHERE folder_id = '$id'";

		if ($conn->query($folder)) {
			$_SESSION['success'] = 'Folder archived successfully';
		}else{
			$_SESSION['error'] = 'Something went wrong';

		}
	}

	header('location: ../documents.php');

?>