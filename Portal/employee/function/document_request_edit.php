<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['edit'])){
		$reference_id = $_POST['reference_id'];
		$request_name = trim($_POST['name']);
		$details = trim($_POST['details']);
		

		$sql = "UPDATE document_request SET request_name= '$request_name', request_note = '$details' WHERE reference_id='$reference_id' ";

		if ($conn->query($sql)) {
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a document request";
			send_notif($conn, $emp_id, $title, 'documents.php', 'admin');
			$_SESSION['success']='Document Request updated successfully';
		}else{
			$_SESSION['error']='Document Request update failed';
		}

	}else if(isset($_POST['reply'])){
		$reference_id = $_POST['reference_id'];
		$request_comment = trim($_POST['comment']);
		$file = isset($_FILES['file']['name'])?$_FILES['file']['name']:'';
		$file_query ='';
		$valid=false;

		if ($file!='') {
			// get extension 
			$extension = pathinfo($file)['extension'];
			//set filename
			$new_filename = $reference_id.".".$extension;

			/* INCASE 
			//get size
			$file_size = $_FILES['file']['size'];
			//valid extension array (document Type)
			$valid_extension = array('pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx');
			*/
			$file_query = ",request_file='$file' ";
			$valid = true;
		}

		
		$sql = "UPDATE document_request SET request_comment= '$request_comment',request_status= 1 $file_query WHERE reference_id='$reference_id' ";

		if ($valid) {
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/Documents/request/".$new_filename)) {
				//PUSH TO DB IF SUCCESS MOVED
				if ($conn->query($sql)) {
					$emp_id = $user['employee_id'];
					$full = $user['firstname'].' '.$user['lastname'];
					$title = $full." sent a reply for the document request";
					send_notif($conn, $emp_id, $title, 'documents.php', 'admin');
					$_SESSION['success']='Document updated successfully';
				}else{
					$_SESSION['error']='Document update failed';
				}
			}else{
				$_SESSION['error'] ='Document uploaded failed, something went wrong';
			}
		}else{
			if ($conn->query($sql)) {
				$emp_id = $user['employee_id'];
				$full = $user['firstname'].' '.$user['lastname'];
				$title = $full." sent a reply for the document request";
				send_notif($conn, $emp_id, $title, 'documents.php', 'admin');
				$_SESSION['success']='Document updated successfully';
			}else{
				$_SESSION['error']='Document update failed';
			}
		}

	}	
	header('location:../documents.php');



?>