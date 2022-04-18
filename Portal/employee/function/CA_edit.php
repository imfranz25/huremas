<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

    // get details
		$id = trim($_POST['id']);
		$type = $_POST['type'];
		$amount = trim($_POST['amount']);
		$reason = trim($_POST['reason']);
	
		$sql = $conn->prepare("UPDATE cash_advance SET ca_type =?, amount=?, ca_reason=? WHERE id=? ");
    $sql->bind_param('sdsd',$type,$amount,$reason,$id);

		if ($sql->execute()) {

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a cash advance request";
			send_notif($conn, $emp_id, $title, 'cash_advance.php', 'admin');
			$_SESSION['success'] = 'Cash Advance Request updated succesfully';

		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}
		
	}else{
		$_SESSION['error'] = 'Select item to edit first';
	}

	header('location: ../cash_advance.php');
?>