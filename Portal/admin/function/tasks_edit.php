<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    //get details
		$id = $_POST['id'];
		$task = $_POST['task'];
		$due = $_POST['due_date'];
		$description = $_POST['description'];
		//prepared stmt
		$sql = $conn->prepare("UPDATE task SET task = ?, description = ?, due_date = ? WHERE id = ? ");
		$sql->bind_param('sssd',$task,$description,$due,$id);

		if($sql->execute()){

      //prepared stmt
      $get_id = $conn->prepare("SELECT employee_id FROM task WHERE id=? ");
			$get_id->bind_param('d',$id);
      $get_id->execute();
      // fetch data
			$query = $get_id->get_result();
			$row = $query->fetch_assoc();
      // send notif
			$employee_id = $row['employee_id']; 
			$title = "Your task has been updated";
			send_notif($conn, $employee_id, $title, 'tasks.php', 'employee');

			$_SESSION['success'] = 'Task updated successfully';
		}
		else{
			$_SESSION['error'] = 'Task updated unsuccessfully';
		}


	}
	else{
		$_SESSION['error'] = 'Select task record to edit first';
	}

	header('location: ../tasks.php');
?>