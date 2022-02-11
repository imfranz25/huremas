<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

    //prepared stmt
		$check = $conn->prepare("SELECT COUNT(*) FROM disciplinary_action WHERE reason =? ");
    $check->bind_param('d',$id);
    //get values
    $id = addslashes($_POST['id']);
    $check->execute();
    $result = $check->get_result();
		$row = $result->fetch_assoc();
		$count = $row['COUNT(*)'];
		
		if ($count==0) {
      //delete category
			$sql = $conn->prepare("DELETE FROM disciplinary_category WHERE id = ? ");
      $sql->bind_param('d',$id);
			//get pass
			$pass  = $_POST['pass'];
      $employee_id = $user['employee_id'];
      
      //challenge
      if (password_verify($pass,get_password($employee_id,$conn))) {
      	if($sql->execute()){
      		$_SESSION['success'] = 'Disciplinary category deleted';
      	}
      	else{
      		$_SESSION['error'] = 'Connection Timeout';
      	}
      }else{
      	 $_SESSION['error'] = 'Incorrect Password, please try again';
      }
		}else{
			$_SESSION['error'] = 'Disciplinary Category currently in used';
		}
	}

	header('location: ../disciplinary.php');

?>