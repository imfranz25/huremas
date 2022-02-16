<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['update'])){

    // update stmt prepared
		$sql = $conn->prepare("UPDATE ratings SET `efficiency`=?,`timeliness`=?,`quality`=?,`accuracy`=?,`remarks`=? WHERE id=? ");
    $sql->bind_param('ssssss',$a3,$a4,$a5,$a6,$a7,$a1);

    //get values
    $a1 = $_POST['rid'];
    $a3 = $_POST['efficiency'];
    $a4 = $_POST['timeliness'];
    $a5 = $_POST['quality'];
    $a6 = $_POST['accuracy'];
    $a7 = $_POST['remarks'];

		if($sql->execute()){

      //select emp id prepared stmt
			$get_id = $conn->execute("SELECT employee_id FROM ratings WHERE id=? ");
      $get_id->bind_param('s',$a1);
      $get_id->execute();
			$result = $get_id->get_result();
			$row = $result->fetch_assoc();
      //getch values & send a notif
			$employee_id = $row['employee_id']; 
			$title = "Your task evaluation has been updated";
			send_notif($conn, $employee_id, $title, 'tasks.php', 'employee');

			$_SESSION['success'] = 'Evaluation updated successfully ' ;
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
    
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../performance_eval.php?page=evaluation');
	

?>