<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
    //get id
		$id = $_POST['id'];
    //select job by department if its currently in use
		$check_job = $conn->prepare("SELECT * FROM job WHERE job_dept = ? ");
    $check_job->bind_param('d',$id);
    $check_job->execute();
    $result = $check_job->get_result();
		$count_job = $result->num_rows;
    // select emp by department if its currently in use
		$check = $conn->prepare("SELECT * FROM employees WHERE department_id = ? ");
    $check->bind_param('d',$id);
    $check->execute();
		$result = $check->get_result();
		$count = $result->num_rows;

		if ($count==0 && $count_job==0) {
			//delete prepared
			$sql = $conn->prepare("DELETE FROM department_category WHERE id = ? ");
      $sql->bind_param('s',$id);
      //get values
			$pass = $_POST['pass'];
			$employee_id = $user['employee_id'];

			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
				if($sql->execute()){
					$_SESSION['success'] = 'Department deleted successfully';
				}
				else{
					$_SESSION['error'] = 'Connection Timeout';
				}
			}else{
				 $_SESSION['error'] = 'Incorrect Password, please try again';
			}


		}else{
			$_SESSION['error'] = 'Department record is currently in used';
		}

	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../position.php');
	
?>