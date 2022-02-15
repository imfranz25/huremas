<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['reject']) || isset($_POST['approve'])){

    //prepared stmt update ca
		$sql = $conn->prepare("UPDATE cash_advance SET status=?, notes = ?,reviewed_by=?  WHERE id=? ");
    $sql->bind_param('sssd',$status,$notes,$reviewed_by,$id);
    //ge values
    $reviewed_by = $user['firstname'].' '.$user['lastname'];
    $id = trim($_POST['id']);
    $notes = isset($_POST['notes']) ? trim($_POST['notes']) : '';
    $status = isset($_POST['reject'])? 'Rejected' : 'Approved';

	
		if($sql->execute()){

      //get the emp id first then notif
			$get_id = $conn->prepare("SELECT employee_id FROM cash_advance WHERE id = ? ");
      $get_id->bind_param('d',$id);
      $get_id->execute();
			$result = $get_id->get_result();
			$row = $result->fetch_assoc();
			$emp_id = $row['employee_id'];

			$title = "Your cash advance request has been ".lcfirst($status);
			send_notif($conn, $emp_id, $title, 'cash_advance.php', 'employee');

			$_SESSION['success'] = 'Cash Advance proccessed successfully';
      
		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../cash_advance.php');
?>