<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

		//update attendance prepared stmt
		$sql = $conn->prepare("UPDATE attendance SET time_in = ?, time_out = ? WHERE id = ? ");
    $sql->bind_param('ssd',$in,$out,$id);

    //get details
    $id = $_POST['aid'];
    $in = $_POST['timein'];
    $out = $_POST['timeout'];
		
		if($sql->execute()){


      //get emp id
			$get_id = $conn->prepare("SELECT employee_id FROM attendance WHERE id = ? ");
      $get_id->bind_param('d',$id);
      $get_id->execute();
			$result = $get_id->get_result();
			$row = $result->fetch_assoc();
      //getch values & send notif
			$employee_id = $row['employee_id']; 
			$title = "Your attendance record has been updated";
			send_notif($conn, $employee_id, $title, 'dtr.php', 'employee');

			$_SESSION['success'] = 'Attendance updated successfully';
		}
		
	}
	else{
		$_SESSION['error'] = 'Select attendance record to edit first';
	}

	header('location: ../dtr.php');
?>