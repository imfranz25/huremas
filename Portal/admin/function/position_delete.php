<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

    //get id
		$id = $_POST['id'];

    $check_job = $conn->prepare("SELECT * FROM job WHERE job_position = ? ");
    $check_job->bind_param('d',$id);
    $check_job->execute();
		$query_job = $check_job->get_result();
		$count_job = mysqli_num_rows($query_job);

    $check = $conn->prepare("SELECT * FROM employees WHERE position_id = ? ");
    $check->bind_param('d',$id);
		$check->execute();
		$query = $check->get_result();
		$count = mysqli_num_rows($query);

		if ($count==0 && $count_job==0) {

			$pass = $_POST['pass'];
			$employee_id = $user['employee_id'];
			$sql = $conn->prepare("DELETE FROM position WHERE id = ? ");
      $sql->bind_param('s',$id);

			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
				if($sql->execute()){
					$_SESSION['success'] = 'Designation record deleted successfully';
				}
				else{
					$_SESSION['error'] = 'Connection Timeout';
				}
			}else{
				 $_SESSION['error'] = 'Incorrect Password, please try again';
			}

		}else{
			$_SESSION['error'] = 'Designation record is currently in used';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../position.php');
	
?>