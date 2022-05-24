<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['editprogs'])){

    //get details
		$id = $_POST['pid'];
		$tid = $_POST['tid'];
		$progress = $_POST['progress'];
		$stats = 0;
		$ttask=1;

		if (isset($_POST['is_complete'])) {
			$stats = $_POST['is_complete'];
			$ttask = 2;
		}
		
		$sql = $conn->prepare("UPDATE task_progress SET progress = ?, is_complete = ? WHERE id = ?  ");
		$sql->bind_param('ssd',$progress,$stats,$id);

		if($sql->execute()){

			if($stats==1){
				$d=date("Y-m-d");
				$update = $conn->prepare("UPDATE task SET status = ?,completed = ? WHERE id = ? ");
        $update->bind_param('ssd',$ttask,$d,$tid);
			}else {
        $update = $conn->prepare("UPDATE task SET status = ? WHERE id = ? ");
        $update->bind_param('sd',$ttask,$tid);
      }

      $update->execute();

			$emp_id = $user['employee_id'];
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." updated a task progress";
			send_notif($conn, $emp_id, $title, 'tasks.php', 'admin');
			$_SESSION['success'] = 'Progress updated successfully';

		}
		else{
			$_SESSION['error'] = 'Progress updated unsuccessfully';
		}


	}
	else{
		$_SESSION['error'] = 'Select task record to edit first';
	}

	header('location: ../tasks.php');
  
?>