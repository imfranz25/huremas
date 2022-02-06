<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	//admin id
	$id = $user['employee_id'];

	function create_id(){
		//creating document_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		return "CVSUDOXC".substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 6);
	}

	if(isset($_POST['add'])){
		$folder_id = $_POST['folder_id'];
		$name = addslashes($_POST['name']);
		$file = $_FILES['file']['name'];
		$owner = isset($_POST['owner'])? $_POST['owner']: '';
		$details = addslashes($_POST['details']);

		
		$document_id = create_id();


		// get extension 
		$extension = pathinfo($file)['extension'];
		//set filename
		$new_filename = $document_id.".".$extension;
		//get size
		$file_size = $_FILES['file']['size'];

		//valid extension array (document Type)
		//$valid_extension = array('pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx');




		$sql = "INSERT INTO documents (document_id,document_name,document_type,document_owner,document_folder,document_details,document_created,document_file) VALUES ('$document_id','$name','document','$owner','$folder_id','$details','$id','$file')";


		// if (!in_array($extension, $valid_extension)) {
		// 	$_SESSION['error'] = 'Invalid File Format, please try again';
		if ($file_size > 5242880) { //5MB Maximum file size
			$_SESSION['error'] = 'Document exceeds the maximum 5 MB limit, please try again';
		}else{
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/Documents/".$new_filename)) {
				//PUSH TO DB IF SUCCESS MOVED
				if ($conn->query($sql)) {
					$_SESSION['success'] ='Document uploaded successfully';
				}else{
					$_SESSION['error'] ='Document uploaded failed';
				}
			}else{
					$_SESSION['error'] ='Document uploaded failed, file type is not supported. Please try again';
				
			}
		}


	}else if (isset($_POST['add_via_request'])) {
		$folder_id = $_POST['folder'];
		$name = trim($_POST['name']);
		$request_id = $_POST['reference_id'];
		$owner = trim($_POST['owner']);
		$details = trim($_POST['details']);
		$file=$_POST['file'];



		$document_id = create_id();
		$extension = pathinfo($file)['extension'];
		$old_name = $request_id.".".$extension;
		$new_filename = $document_id.".".$extension;
		if (copy($_SERVER['DOCUMENT_ROOT'].'/Documents/request/'.$old_name, $_SERVER['DOCUMENT_ROOT'].'/Documents/'.$new_filename)) {
			$sql = "INSERT INTO documents (document_id,document_name,document_type,document_owner,document_folder,document_details,document_created,document_file) VALUES ('$document_id','$name','document','$owner','$folder_id','$details','$id','$file')";
			$update = "UPDATE document_request SET folder_id='$folder_id', request_status=3 WHERE reference_id = '$request_id' ";
			if ($conn->query($sql) && $conn->query($update)) {
				$_SESSION['success'] ='Document validated successfully';
			}else{
				$_SESSION['error'] ='Document validate failed';
			}
		}else{
			$_SESSION['error'] ='Something went wrong, please try again..';
		}

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../documents.php');

?>