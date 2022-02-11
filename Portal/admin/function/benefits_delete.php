<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
    //prepare stmt check if exist
		$check = $conn->prepare("SELECT *,(SELECT COUNT(*) FROM benefit_record WHERE benefit_record.benefit_id=benefits.benefit_id) AS count FROM benefits WHERE  id = ? ");
    $check->bind_param('s',$id);
    //get id
    $id = $_POST['id'];
    $check->execute();
    $result = $check->get_result();
		$row = $result->fetch_assoc();

		if ($row['count']==0) {
      //delete prepared
      $sql = $conn->prepare("DELETE FROM benefits WHERE id = ? ");
      $sql->bind_param('s',$id);
      //get pass
			$pass = $_POST['pass'];
			$employee_id = $user['employee_id'];
			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
				if($sql->execute()){
					$_SESSION['success'] = 'Benefit deleted successfully';
				}
				else{
					$_SESSION['error'] = 'Connection Timeout';
				}
			}else{
				$_SESSION['error'] = 'Incorrect Password, please try again';
			}
		}else{
		 	$_SESSION['error'] = 'Delete benefit record failed, record is currently in used';
		}

	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../benefits.php');
	
?>