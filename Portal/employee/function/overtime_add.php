<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['add'])){

    //get details
		$date = $_POST['date'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$reason = $_POST['reason'];
		$eid = $_POST['eid'];

		$sql = $conn->prepare("INSERT INTO overtime_request (`employee_id`, `date`, `start`, `end`,`reason`,`status`) VALUES (?,?,?,?,?,'0')");
    $sql->bind_param('sssss',$eid,$date,$start,$end,$reason);	
		
		if($sql->execute()){

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." send a overtime request";
			send_notif($conn, $emp_id, $title, 'overtime.php', 'admin');
			$_SESSION['success'] = 'Overtime request added successfully';

		}
		else{
			$_SESSION['error'] = "Overtime request failed";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../overtime.php');

?>