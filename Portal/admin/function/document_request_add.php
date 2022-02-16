<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['name'])){

    //get details
		$request_by = $user['type'];
		$request_name = trim($_POST['name']);
		$employee_id = trim($_POST['employee']);
		$details = trim($_POST['details']);
		
		//creating reference_id
		$reference_id = "CVSUREQA".generate_id();

		$sql = $conn->execute("INSERT INTO document_request (reference_id,employee_id,request_name,request_note,request_by) VALUES (?,?,?,?,?)");
    $sql->bind_param('sssss',$reference_id,$employee_id,$request_name,$details,$request_by);

    //send notif
		$title = "You have new document request from HR";
		send_notif($conn, $employee_id, $title, 'documents.php', 'employee');

		echo ($sql->execute())?1:0;


	}else{
    header('location:../documents.php');
  }   




?>