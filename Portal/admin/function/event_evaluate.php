<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

  //update event request status prepare stmt
  $update_erequest = $conn->prepare("UPDATE event_request SET request_status=? 
                                    WHERE reference_id = ? ");
  $update_erequest->bind_param('ds',$status,$id);

  //get employee id preapre stmt
  $get_id = $conn->prepare("SELECT employee_id FROM event_request 
                            WHERE reference_id = ? ");
  $get_id->bind_param('s',$id);


  // ============================================================

	if(isset($_POST['approve'])){

    //insert prepare
		$insert = $conn->prepare("INSERT INTO events 
              (reference_id, event_name, display_image, event_date, event_from, event_to, event_venue)
              SELECT reference_id, event_name, display_image, event_date, event_from, event_to, event_venue
              FROM event_request WHERE reference_id = ? ;");
    $insert->bind_param('s',$id);

    //get reference id
    global $update_erequest,$id,$status,$get_id;
    $id = $_POST['reference_id'];
    $status = 1; // approved

		if ($insert->execute() && $update_erequest->execute()) {

			$get_id->execute();
      $result = $get_id->get_result();
			$row = $result->fetch_assoc();
      //fetch values and  send notif to employee
			$emp_id = $row['employee_id'];
			$title = "Your event request has been approved";
			send_notif($conn, $emp_id, $title, 'events.php', 'employee');
			$_SESSION['success'] = 'Event request approved';

		}else {
			$_SESSION['error'] = 'Connection Timeout';
		}
	}else if(isset($_POST['reject'])){

    //initialize
    global $update_erequest,$id,$status,$get_id;
		$id = $_POST['reference_id'];
    $status = 2; // rejected

		if ($update_erequest->execute()) {

      $get_id->execute();
      $result = $get_id->get_result();
			$row = $result->fetch_assoc();
      //getch values and notif to employee
			$emp_id = $row['employee_id'];
			$title = "Your event request has been rejected";
			send_notif($conn, $emp_id, $title, 'events.php', 'employee');
			$_SESSION['success'] = 'Event request rejected';

		}else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}

	header('location: ../events.php');

?>