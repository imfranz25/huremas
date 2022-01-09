<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){

		$id = $user['employee_id'];
		$folder_id = $_POST['folder_id'];
		$name = addslashes($_POST['name']);
		$link = addslashes($_POST['link']);
		$owner = isset($_POST['owner'])? $_POST['owner']: '';
		$details = addslashes($_POST['details']);

		//creating document_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$document_id = "CVSULINK".substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 6);


		$sql = "INSERT INTO documents (document_id,document_name,document_type,document_owner,document_folder,document_details,document_created,document_file) VALUES ('$document_id','$name','url','$owner','$folder_id','$details','$id','$link')";


		if ($conn->query($sql)) {
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