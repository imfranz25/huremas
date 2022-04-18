<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['edit'])){

    // get details
		$reference_id = $_POST['reference_id'];
		$request_name = trim($_POST['name']);
		$details = trim($_POST['details']);
		
    // prepared stmt
		$sql = $conn->prepare("UPDATE document_request SET request_name= ?, request_note = ? WHERE reference_id=? ");
    $sql->bind_param('sss',$request_name,$details,$reference_id);

		if ($sql->bind_param()) {

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a document request";
			send_notif($conn, $emp_id, $title, 'documents.php', 'admin');
			$_SESSION['success']='Document Request updated successfully';

		}else{
			$_SESSION['error']='Document Request update failed';
		}

	}else if(isset($_POST['reply'])){

    //get details
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
			$file_query = ",request_file='$file' ";
			$valid = true;
		}

    // prepared stmt
		$sql = $conn->prepare("UPDATE document_request SET request_comment= ?,request_status= 1 $file_query WHERE reference_id=? ");
    $sql->bind_param('ss',$request_comment,$reference_id);

		if ($valid) {
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].$global_link."/Documents/request/".$new_filename)) {
				//PUSH TO DB IF SUCCESS MOVED
				if ($sql->execute()) {

          // send notif
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
		}else {
			if ($sql->execute()) {

        // send notif
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