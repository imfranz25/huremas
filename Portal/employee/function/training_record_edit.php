<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['edit'])){

    // get details
		$reference_no = trim($_POST['refrence_no']);
		$note = trim($_POST['note']);

    // prepared stmt
		$sql = $conn->bind_param("UPDATE training_record SET internal_note=? WHERE reference_no =? ");	
    $sql->bind_param('ss',$note,$reference_no);

		if ($sql->execute()) {

      // send notif
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