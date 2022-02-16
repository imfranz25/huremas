<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

    //get pass
		$pass  = $_POST['pass'];
    $employee_id = $user['employee_id'];
        
    //challenge
    if (password_verify($pass,get_password($employee_id,$conn))) {

      //prepared stmt attt
      $sql = $conn->prepare("DELETE FROM attendance WHERE id = ? ");
      $sql->bind_param('s',$id);
      //get id
      $id = $_POST['id'];


      if($sql->execute()){
    		$_SESSION['success'] = 'Attendance deleted successfully';
    	}
    	else{
    		$_SESSION['error'] = 'Connection Timeout';
    	}

    }else{
      $_SESSION['error'] = 'Incorrect Password, please try again';
    }

	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}


	header('location: ../dtr.php');
	
?>