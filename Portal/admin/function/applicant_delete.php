<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		//get pass
		$pass = $_POST['pass'];
		$employee_id = $user['employee_id'];
    //get id
    $id = $_POST['id'];

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {

      //delete (prepared stmt)
			$sql = $conn->prepare("DELETE FROM applicant WHERE id = ? ");
      $sql->bind_param('s',$id);

      // delete resume file
      $resume = $conn->prepare("SELECT attachment FROM applicant WHERE id= ? ");
      $resume->bind_param('s',$id);
      $resume->execute();
      $result = $resume->get_result();
      $row = $result->fetch_assoc();
      $filename = $row['attachment'];

      //DELETE EXISTING FILE
      if(file_exists("../uploads/applicant/".$filename)){
        if (unlink("../uploads/applicant/".$filename)) {
            echo ($sql->execute())? 1:0;
        } else {
          echo 0; //error
        }
      } else {
        echo 0; //error
      }

		}else{
			echo 2; // wrong password
		}
		
	}else{
    header('location:../applicant.php');
  }
?>