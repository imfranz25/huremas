<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['delete'])){

		$id = $_POST['id'];
		$tid = $_POST['tid'];
		$stats = $_POST['stats'];

		$sql = $conn->prepare("DELETE FROM task_progress WHERE id = ? ");
    $sql->bind_param('s',$id);

		if($sql->execute()){

			if($stats==1){
				$update = $conn->prepare("UPDATE task SET status ='1',completed ='' WHERE id =? ");
        $update->bind_param('s',$tid);
        $update->execute();
			}
			$_SESSION['success'] = 'Progress deleted successfully';

		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}

	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../tasks.php');
	
?>