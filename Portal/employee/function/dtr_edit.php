<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['edit'])){

    // get details
		$id = $_POST['aid'];
		$in = $_POST['timein'];
		$out = $_POST['timeout'];
		$reason = $_POST['reason'];
		
		$sql = $conn->prepare("INSERT INTO `attendance_correction`( `attendance_id`, `req_in`, `req_out`, `status`, `reason`) VALUES (?,?,?,'0',?) ");
    $sql->bind_param('dsss',$id,$in,$out,$reason);
		
		if($sql->execute()){

      // send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." sent a request for attendance correction";
			send_notif($conn, $emp_id, $title, 'record_correction.php', 'admin');
			$_SESSION['success'] = 'Request sent successfully';

		}

	}
	else{
		$_SESSION['error'] = 'Select attendance record to appeal first';
	}

	header('location: ../dtr.php');
?>