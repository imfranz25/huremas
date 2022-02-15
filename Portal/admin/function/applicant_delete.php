<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		//get pass
		$pass = $_POST['pass'];
		$employee_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
      //delete (prepared stmt)
			$sql = $conn->prepare("DELETE FROM applicant WHERE id = ? ");
      $sql->bind_param('s',$id);
      //get id
      $id = $_POST['id'];
			echo ($sql->execute())? 1:0;
		}else{
			echo 2;
		}
		
	}else{
    header('location:../applicant.php');
  }
?>