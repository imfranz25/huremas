<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	//admin id
	$id = $user['employee_id'];
  $sql = $conn->prepare("INSERT INTO documents (document_id,document_name,document_type,document_owner,document_folder,document_details,document_created,document_file) VALUES (?,?,'document',?,?,?,?,?)");


	if(isset($_POST['add'])){

    global $sql;

    //get values
		$folder_id = $_POST['folder_id'];
		$name = addslashes($_POST['name']);
		$file = $_FILES['file']['name'];
		$owner = isset($_POST['owner'])? $_POST['owner']: '';
		$details = addslashes($_POST['details']);

		//generate docu id
		$document_id = 'CVSUDOXC'.generate_id();
		// get extension 
		$extension = pathinfo($file)['extension'];
		//set filename
		$new_filename = $document_id.".".$extension;
		//get size
		$file_size = $_FILES['file']['size'];

		//valid extension array (document Type)
		//$valid_extension = array('pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx');


		//bind params
    $sql->bind_param('sssssss',$document_id,$name,$owner,$folder_id,$details,$id,$file);


		// if (!in_array($extension, $valid_extension)) {
		// 	$_SESSION['error'] = 'Invalid File Format, please try again';
		if ($file_size > 5242880) { //5MB Maximum file size
			$_SESSION['error'] = 'Document exceeds the maximum 5 MB limit, please try again';
		}else{
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$global_link."/Documents/".$new_filename)) {
				//PUSH TO DB IF SUCCESS MOVED
				if ($sql->execute()) {
					$_SESSION['success'] ='Document uploaded successfully';
				}else{
					$_SESSION['error'] ='Document uploaded failed';
				}
			}else{
				$_SESSION['error'] ='Document uploaded failed, file type is not supported. Please try again';
			}
		}


	}else if (isset($_POST['add_via_request'])) {

    global $sql;

    //get values
		$folder_id = $_POST['folder'];
		$name = trim($_POST['name']);
		$request_id = $_POST['reference_id'];
		$owner = trim($_POST['owner']);
		$details = trim($_POST['details']);
		$file=$_POST['file'];

    //generate docu id
		$document_id = 'CVSUDOXC'.generate_id();

    //get file properties
		$extension = pathinfo($file)['extension'];
		$old_name = $request_id.".".$extension;
		$new_filename = $document_id.".".$extension;

		if (copy($_SERVER['DOCUMENT_ROOT'].$global_link.'/Documents/request/'.$old_name, $_SERVER['DOCUMENT_ROOT'].$global_link.'/Documents/'.$new_filename)) {

      //bind params
      $sql->bind_param('sssssss',$document_id,$name,$owner,$folder_id,$details,$id,$file);

			$update = $conn->prepare("UPDATE document_request SET folder_id=?, request_status=3 WHERE reference_id = ? ");
      $update->bind_param('ss',$folder_id,$request_id);


			if ($sql->execute() && $update->execute()) {
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