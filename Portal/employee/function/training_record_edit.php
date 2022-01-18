<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['edit'])){
		$reference_no = trim($_POST['refrence_no']);
		$note = trim($_POST['note']);

		$sql = "UPDATE training_record SET internal_note='$note' WHERE reference_no ='$reference_no' ";	

		if ($conn->query($sql)) {

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a training request";
			send_notif($conn, $emp_id, $title, 'training_list.php', 'admin');



			$_SESSION['success']='Training Request updated successfully';
		}else{
			$_SESSION['error']='Connection Timeout';
		}
	}	
	header('location:../training.php');

?>