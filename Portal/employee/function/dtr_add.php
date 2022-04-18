<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['addIn'])){

    // get ids
		$id = $_POST['eid'];
		$eid = $_POST['empid'];
		$sql = $conn->prepare("INSERT INTO attendance (employee_id,time_out) VALUES (?,null)");	
    $sql->bind_param('s',$id);
		
		if(($id==$eid)&&($sql->execute())){

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full."has timed-in";
			send_notif($conn, $emp_id, $title, 'dtr.php', 'admin');
			$_SESSION['success'] = 'Time-in added successfully';

		}else {
		  $_SESSION['error'] = 'Invalid EMployee ID';
	  }
	}else if(isset($_POST['addOut'])){

    // get ids
		$id = $_POST['eid'];
		$eid = $_POST['empid'];
		$aids = $_POST['aid'];

		$sql = $conn->prepare("UPDATE attendance SET time_out=current_timestamp() WHERE id=? ");	
    $sql->bind_param('s',$aids);
		
		if(($id==$eid)&&($sql->execute())){

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full."has timed-out";
			send_notif($conn, $emp_id, $title, 'dtr.php', 'admin');
			$_SESSION['success'] = 'Time-out added successfully';

		}else{
		  $_SESSION['error'] = 'Invalid EMployee ID';
	  }

	}else{
		$_SESSION['error'] = 'Fillup the form first';
	}
	header('location: ../dtr.php');
?>