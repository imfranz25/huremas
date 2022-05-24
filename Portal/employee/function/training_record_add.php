<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['code'])){

    // get details
		$code = trim($_POST['code']);
		$note = trim($_POST['note']);
		$emp_id = $user['employee_id'];

    // reference no (unique)
    $reference_no = 'CVSUATT'.generate_id();

		$sql = $conn->prepare("INSERT INTO training_record (reference_no,employee_id,training_code,status,internal_note) VALUES (?,?,?,'Pending',?)");	
    $sql->bind_param('ssss',$reference_no,$emp_id,$code,$note);

		if ($sql->execute()) {

      //  send notif
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." sent a training request";
			send_notif($conn, $emp_id, $title, 'training_list.php', 'admin');

			echo 1;
		}else{
			echo 0; // error
		}

	}	else {
    header('location: ../training.php');
  }
	

?>