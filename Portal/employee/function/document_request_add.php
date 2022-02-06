<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['add'])){
		$employee_id = $user['employee_id'];
		$request_by = $user['type'];
		$request_name = trim($_POST['name']);
		$details = trim($_POST['details']);
		
		//creating reference_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$reference_id = "CVSUREQA".substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 6);

		$sql = "INSERT INTO document_request (reference_id,employee_id,request_name,request_note,request_by) VALUES ('$reference_id','$employee_id','$request_name','$details','$request_by')";

		if ($conn->query($sql)) {
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