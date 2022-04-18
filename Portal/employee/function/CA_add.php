<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['add'])){

    // get details
		$emp_id = $user['employee_id'];
		$date = date("Y-m-d");
		$type = $_POST['type'];
		$amount = trim($_POST['amount']);
		$reason = trim($_POST['reason']);

		//creating referenceid
		$reference_id = "CA".generate_id();


		$sql = $conn->prepare("INSERT INTO cash_advance (reference_id,employee_id,req_date,ca_type,ca_reason,amount,status) VALUES (?,?,?,?,?,?,'Pending')");
    $sql->bind_param('ssssss',$reference_id,$emp_id,$date,$type,$reason,$amount);

		if($sql->execute()){

      // send notifs
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." send a cash advance request";
			send_notif($conn, $emp_id, $title, 'cash_advance.php', 'admin');
			$_SESSION['success'] = 'Cash Advance Request sent successfully';

		}
		else{
			$_SESSION['error'] = 'Connection Time-out';
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../cash_advance.php');

?>