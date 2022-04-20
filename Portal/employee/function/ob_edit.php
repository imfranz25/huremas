<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['edit'])){

    //get details
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['reason'];
		$id = $_POST['otid'];
		
		$sql = $conn->prepare("UPDATE `allowance` SET `date`=?,`start`=?, `end`=?, `details`=? WHERE id= ? ");
    $sql->bind_param('sssss',$date,$start,$end,$reason,$id);
		
		if($sql->execute()){

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a official business request";
			send_notif($conn, $emp_id, $title, 'official_business.php', 'admin');
			$_SESSION['success'] = 'Official Business request updated successfully';

		}
		else{
			$_SESSION['error'] = "Official Business request update failed";
		}

	}
	else{
		$_SESSION['error'] = 'Select Official Business record to edit first';
	}

	header('location: ../official_business.php');
?>