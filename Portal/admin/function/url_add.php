<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    // get details
		$id = $user['employee_id'];
		$folder_id = $_POST['folder_id'];
		$name = addslashes($_POST['name']);
		$link = addslashes($_POST['link']);
		$owner = isset($_POST['owner'])? $_POST['owner']: '';
		$details = addslashes($_POST['details']);

		//creating document_id
    $document_id = 'CVSULINK'.generate_id();

		$sql = $conn->prepare("INSERT INTO documents (document_id,document_name,document_type,document_owner,document_folder,document_details,document_created,document_file) VALUES (?,?,'url',?,?,?,?,?'')");
    $sql->bind_param('sssssss',$document_id,$name,$owner,$folder_id,$details,$id,$link);

		if ($sql->execute()) {
			$_SESSION['success']='URL added successfully';
		}else{
			$_SESSION['error']='URL add failed';
		}

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../documents.php');

?>