<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

	  //eval add prepared stmt
		$sql = $conn->prepare("INSERT INTO ratings (`employee_id`, `task_id`, `efficiency`, `timeliness`, `quality`, `accuracy`, `remarks`) VALUES (?,?,?,?,?,?,?)");
    $sql->bind_param('sssssss',$a1,$a2,$a3,$a4,$a5,$a6,$a7);

    //get values
    $a1 = $_POST['employee_id'];
    $a2 = $_POST['task_id'];
    $a3 = $_POST['efficiency'];
    $a4 = $_POST['timeliness'];
    $a5 = $_POST['quality'];
    $a6 = $_POST['accuracy'];
    $a7 = $_POST['remarks'];
    $date = date('m/d/Y h:i:s a', time());


		if($sql->execute()){

			// senf notif
			$title = "Your task evaluation has been evaluated";
			send_notif($conn, $a1, $title, 'tasks.php', 'employee');

			$_SESSION['success'] = 'Evaluation added successfully ' ;
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