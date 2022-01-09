<?php
	include '../includes/session.php';

	if(isset($_POST['document_id'])){
		$document_id = $_POST['document_id'];
		$status = ($_POST['status']=='lock')?1:0;
		$valid = false;

		// IF STATUS IS TO UNLOCK -> CHECK PASSWORD IF VALID
		if ($status==0) {
			$pass = trim($_POST['pass']);
			if (password_verify($pass, $user['password'])) {
				$valid = true;
            }
		}else{
			$valid = true; //IF STATUS IS LOCK NO NEED TO VALIDATE PASS
		}

		// CHECK IF STATUS IS VALID
		if ($valid) {
			$sql = "UPDATE documents SET document_status=$status WHERE document_id='$document_id' ";
			echo ($conn->query($sql))? (($status==1)?1:0):2;
		}else{
			echo 3; //invalid password
		}
	}else if(isset($_POST['archive'])){
		$document_id = $_POST['document_id_archive'];
		$sql = "UPDATE documents SET document_archive=1 WHERE document_id='$document_id' ";
		if($conn->query($sql)){
			$_SESSION['success']='Document archived successfully';
		}else{
			$_SESSION['error']='Document archive failed';
		}
		header('location:../documents.php');
	}else if(isset($_POST['edit'])){

		$document_id = $_POST['document_id_edit'];
		$document_name = trim($_POST['name']);
		$document_folder = $_POST['document_folder'];
		$document_owner = trim($_POST['owner']);
		$document_details = trim($_POST['details']);

		// MANUAL CHECK -> URL OR DOCUMENT
		$link = isset($_POST['link'])? trim($_POST['link']) : '';
		if ($link=='') {
			$type = 'document'; //its a document
		}else{
			$document_file = $link; // its a link
			$type='url';
		}

		// DOCUMENT QUERY ASSIGNMENT
		if ($type == 'document') {
			$document_file = isset($_FILES['file']['name'])?$_FILES['file']['name'] : '';
			if ($document_file=='') {
				$file_query=""; //dont update file if the user didnt insert any
			}else{
				$file_query=",document_file='$document_file' ";
			}
		}else{
			$file_query=",document_file='$document_file' ";
		}


		$sql = "UPDATE documents SET document_name='$document_name',document_owner='$document_owner',document_folder='$document_folder',document_details='$document_details' $file_query WHERE document_id='$document_id' ";

		// MAKE SURE THE DOCUMENT IS UPLOADED BEFORE PUSHING DATA TO DATABASE
		$valid=false;
		if ($type=="url") {
			$valid=true;
		}else{
			if ($document_file!='') {

				// get extension 
				$extension = pathinfo($document_file)['extension'];
				//set filename
				$new_filename = $document_id.".".$extension;
				//get size
				$file_size = $_FILES['file']['size'];
				if ($file_size > 5242880) { //5MB Maximum file size
					$_SESSION['error'] = 'Document exceeds the maximum 5 MB limit, please try again';
				}else{
					$valid=true;  //set to true temporarily
					
					//DELETE EXISTING FILE
					if(file_exists($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Documents/".$new_filename)){
						if (unlink($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Documents/".$new_filename)) {
							$valid=true; 
						}else{
							$valid=false; 
						}
					}

					// NOW MOVE THE FILE 
					if ($valid) {
						if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/HUREMAS/Documents/".$new_filename)) {
							$valid=true; // document move success valid true
						}else{
							$valid=false; // document move failed valid false
						}
					}
				}
			}else{
				$valid=true;
			}
		}

		if ($valid) {
			if($conn->query($sql)){
				$_SESSION['success']='Document changes saved successfully';
			}else{
				$_SESSION['error']='Document update failed';
			}
		}else{
			$_SESSION['error']='Something went wrong, please try again';
		}
		
		header('location:../documents.php');
	}else if (isset($_POST['document_starred'])) {
		$document_starred = $_POST['document_starred'];
		$document_id = $_POST['document_id_starred'];
		$status = ($document_starred=='1')?0:1;
		$sql="UPDATE documents SET document_starred=$status WHERE document_id='$document_id' ";
		if ($conn->query($sql)) {
			echo json_encode($status);
		}
	}		

?>