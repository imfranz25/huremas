<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

		
		$pass  = $_POST['pass'];
    $employee_id = $user['employee_id'];
    
    //challenge
    if (password_verify($pass,get_password($employee_id,$conn))) {
      //prepared stmt
      $sql = $conn->prepare("DELETE FROM task WHERE id = ? ");
		  $sql->bind_param('s',$id);
      $sql2 = $conn->prepare("DELETE FROM task_progress WHERE task_id = ? ");
		  $sql2->bind_param('s',$id);
      //get id
      $id = $_POST['id'];

  		if($sql->execute() && $sql2->execute()){
  			$_SESSION['success'] = 'Task deleted successfully';
  		}
  		else{
  			$_SESSION['error'] = "Connection Timeout";
  		}
      
    }else{
    	 $_SESSION['error'] = 'Incorrect Password, please try again';
    }
		
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}


	header('location: ../tasks.php');
	
?>