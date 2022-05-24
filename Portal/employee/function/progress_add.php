<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['add'])){

		$tid = $_POST['task_id'];
		$progress = $_POST['progress'];
		$stats = 0;
		$ttask=1;

		if (isset($_POST['is_complete'])) {
			$stats = $_POST['is_complete'];
			$ttask = 2;
		}

		$sql = $conn->prepare("INSERT INTO task_progress (task_id, progress, is_complete) VALUES (?, ? , ?)");	
    $sql->bind_param('sss',$tid,$progress,$stats);
		
		if($sql->execute()){

			if($stats==1){
				$d=date("Y-m-d");
				$update = $conn->prepare("UPDATE task SET status =?, completed =? WHERE id =? ");
        $update->bind_param('ssd',$ttask,$d,$tid);
			}else {
        $update = $conn->prepare("UPDATE task SET status = ? WHERE id = ? ");
        $update->bind_param('sd',$ttask,$tid);
      }

			$update->execute();

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." send a task progress";
			send_notif($conn, $emp_id, $title, 'tasks.php', 'admin');
			$_SESSION['success'] = 'New Task Progress added successfully';

		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../tasks.php');

?>