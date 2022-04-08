<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['reject']) || isset($_POST['approve'])){

		$reviewed_by = $user['firstname'].' '.$user['lastname'];
		$id = trim($_POST['id']);
		$aid = trim($_POST['aid']);

		$in = $_POST['timein'];
		$out = $_POST['timeout'];

		$status = isset($_POST['reject'])? '2' : '1';


		$sql = $conn->prepare("UPDATE attendance_correction SET status=?, reviewed_by=? WHERE id=? ");
    $sql->bind_param('ssd',$status,$reviewed_by,$id);

	
		if($sql->execute()){

			if($status=='1'){
				$sql1 = $conn->prepare("UPDATE attendance SET time_in=?, time_out=? WHERE id=? ");
        $sql1->bind_param('ssd',$in,$out,$aid);
				$sql1->execute();
			}

      // prepared stmt
			$get_id = $conn->prepare("SELECT employee_id FROM attendance WHERE id=? ");
      $get_id->bind_param('d',$aid);
      $get_id->execute();
			$query = $get_id->get_result();
			$row = $query->fetch_assoc();
      // fetch details & send notif
			$employee_id = $row['employee_id']; 
			$title = "Your attendance correction has been evaluated";
			send_notif($conn, $employee_id, $title, 'dtr.php', 'employee');
			$_SESSION['success'] = 'Time Record Correction proccessed successfully';

		}else{
			$_SESSION['error'] = "Connection Timeout";
		}


	}else  {
		$_SESSION['error'] = 'Review the form first';
	}

	header('location: ../record_correction.php');
?>