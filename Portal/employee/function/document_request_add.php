<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['add'])){

    //get details
		$employee_id = $user['employee_id'];
		$request_by = $user['type'];
		$request_name = trim($_POST['name']);
		$details = trim($_POST['details']);
		
		//creating reference_id
		$reference_id = "CVSUREQA".generate_id();

		$sql = $conn->prepare("INSERT INTO document_request (reference_id,employee_id,request_name,request_note,request_by) VALUES (?,?,?,?,?) ");
    $sql->bind_param('sssss',$reference_id,$employee_id,$request_name,$details,$request_by);

		if ($sql->execute()) {

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." send a document request";
			send_notif($conn, $emp_id, $title, 'documents.php', 'admin');
			$_SESSION['success']='Document Request sent successfully';

		}else{
			$_SESSION['error']='Document Request send failed';
		}

	}	

	header('location:../documents.php');



?>