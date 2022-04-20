<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['edit'])){

    //ge details
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['reason'];
		$id = $_POST['otid'];
		
		$sql = $conn->prepare("UPDATE `overtime_request` SET `date`=?, `start`=?, `end`=?, `reason`=? WHERE id= ? ");
    $sql->bind_param('sssss',$date,$start,$end,$reason,$id);
		
		if($sql->execute()){

      //send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a overtime request";
			send_notif($conn, $emp_id, $title, 'overtime.php', 'admin');
			$_SESSION['success'] = 'Overtime request updated successfully';

		}
		else{
			$_SESSION['error'] = "Overtime request update failed";
		}

	}
	else{
		$_SESSION['error'] = 'Select overtime record to edit first';
	}

	header('location: ../overtime.php');
?>