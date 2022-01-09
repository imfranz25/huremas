<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){

		$name = addslashes($_POST['name']);
		$details = addslashes($_POST['details']);
		$folder_id = addslashes($_POST['folder_id']);


		$sql = "UPDATE document_folder SET folder_name = '$name', folder_details = '$details' WHERE folder_id = '$folder_id' ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Folder updated successfully';
		}
		else{
			$_SESSION['error'] = 'Folder name already exist, try another one';
		}
	}	
	else{
		$_SESSION['error'] = 'Folder Not Found';
	}

	header('location: ../documents.php');

?>