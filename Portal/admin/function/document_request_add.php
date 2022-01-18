<?php
	include '../includes/session.php';

	if(isset($_POST['name'])){
		$request_by = $user['type'];
		$request_name = trim($_POST['name']);
		$employee_id = trim($_POST['employee']);
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


		// $get_id = "SELECT employee_id FROM cash_advance WHERE id = $id ";
			// $query = $conn->query($get_id);
			// $row = $query->fetch_assoc();
			// $emp_id = $row['employee_id'];
		$title = "You have new document request from HR";
		send_notif($conn, $employee_id, $title, 'documents.php', 'employee');

		echo ($conn->query($sql))?1:0;


	}	



?>