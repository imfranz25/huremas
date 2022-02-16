<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    //update prepared stmt
		$sql = $conn->prepare("UPDATE document_folder SET folder_name = ?, folder_details = ? WHERE folder_id = ? ");
    $sql->bind_param('sss',$name,$details,$folder_id);
    //get values
    $name = addslashes($_POST['name']);
    $details = addslashes($_POST['details']);
    $folder_id = addslashes($_POST['folder_id']);

		if($sql->execute()){
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