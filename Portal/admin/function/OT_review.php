<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['submit'])){

    //prepared stmt
		$sql = $conn->prepare("UPDATE overtime_request SET status=?,evaluated_by=?,overtime_code=?,notes=? WHERE id=? ");
    $sql->bind_param('ssssd',$status,$reviewed_by,$ot,$notes,$id);
    //get details
    $id = $_POST['id'];
    $reviewed_by = $user['firstname'].' '.$user['lastname'];
    $status = $_POST['Status'];
    $ot = $_POST['type'];
    $notes = $_POST['notes'];

		if($sql->execute()){

			$get_id = $conn->prepare("SELECT employee_id FROM overtime_request WHERE id=? ");
      $get_id->bind_param('d',$id);
      $get_id->execute();
			$result = $get_id->get_result();
			$row = $result->fetch_assoc();
			$employee_id = $row['employee_id']; 
			$title = "Your overtime request has been evaluated";
			send_notif($conn, $employee_id, $title, 'overtime.php', 'employee');

			$_SESSION['success'] = 'Overtime request proccessed successfully';
		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../overtime.php');
?>