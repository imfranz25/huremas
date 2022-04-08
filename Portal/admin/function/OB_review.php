<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['submit'])){

    //prepared stmt allowance update
		$sql = $conn->prepare("UPDATE allowance SET status=?,evaluated_by=?,cash=?,notes=? WHERE id=? ");
    $sql->bind_param('ssssd',$status,$reviewed_by,$ot,$notes,$id);

    //get details
    $id = $_POST['id'];
    $reviewed_by = $user['firstname'].' '.$user['lastname'];
    $status = $_POST['Status'];
    $ot = $_POST['type'];
    $notes = $_POST['notes'];
	
		if($sql->execute()){

			$get_id = $conn->prepare("SELECT employee_id FROM allowance WHERE id=? ");
      $get_id->bind_param('d',$id);
      $get_id->execute();
			$result = $get_id->get_result();
			$row = $result->fetch_assoc();
			$employee_id = $row['employee_id']; 
			$title = "Your official business request has been evaluated";
			send_notif($conn, $employee_id, $title, 'official_business.php', 'employee');

			$_SESSION['success'] = 'Official Business request proccessed successfully';
		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../official_business.php');
?>