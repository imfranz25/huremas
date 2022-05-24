
<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['save'])){

    // get details
		$reference=trim($_POST['ref_review']);
		$rate = trim($_POST['rate']);
		$comment = trim($_POST['comment']);
	
    //  prepared stmt
		$sql = $conn->prepare("UPDATE training_record SET review=?, comment=?, status='Reviewed' WHERE reference_no=? ");
    $sql->bind_param('dss',$rate,$comment,$reference);

		if ($sql->execute()) {

      //  send notif
			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." sent a training review";
			send_notif($conn, $emp_id, $title, 'training_list.php', 'admin');
			$_SESSION['success'] = 'Review sent succesfully';

		}else{
			$_SESSION['error'] = "Connection Error";
		}

		
	}else{
		$_SESSION['error'] = 'Select item to edit first';
	}

	header('location: ../training.php');
?>