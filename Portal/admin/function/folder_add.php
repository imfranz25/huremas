<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

		//insert folder prepared stmt
		$sql = $conn->prepare("INSERT INTO document_folder (folder_id,folder_name,folder_details, folder_created_by) VALUES (?,?,?,?)");
    $sql->bind_param('ssss',$folder_id,$name,$details,$id);
    //get values
    $id = $user['employee_id'];
    $name = addslashes($_POST['name']);
    $details = addslashes($_POST['details']);
    //creating folder_id
    $folder_id = "CVSUFOLD".generate_id();

		if($sql->execute()){
			$_SESSION['success'] = 'Folder added successfully';
		}
		else{
			$_SESSION['error'] = 'Folder name already exist, try another one';
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../documents.php');

?>