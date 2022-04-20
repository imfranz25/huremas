<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['add'])){

    // get details
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['details'];
		$eid = $_POST['eid'];

		$sql = $conn->prepare("INSERT INTO allowance (`employee_id`, `date`, `start`, `end`,`details`,`status`) VALUES (?,?,?,?,?,'0')");	
    $sql->bind_param('sssss',$eid,$date,$start,$end,$reason);
		
		if($sql->execute()){

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." sent a official business request";
			send_notif($conn, $emp_id, $title, 'official_business.php', 'admin');
			$_SESSION['success'] = 'Official Business request added successfully';

		}
		else{
			$_SESSION['error'] = "Official Business request failed";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
  
	header('location: ../official_business.php');
?>