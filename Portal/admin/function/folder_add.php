<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
		$id = $user['employee_id'];
		$name = addslashes($_POST['name']);
		$details = addslashes($_POST['details']);

		//creating folder_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$folder_id = "CVSUFOLD".substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 6);

		$sql = "INSERT INTO document_folder (folder_id,folder_name,folder_details, folder_created_by) VALUES ('$folder_id','$name', '$details','$id')";
		if($conn->query($sql)){
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