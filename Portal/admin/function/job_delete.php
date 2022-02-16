<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

    //prepared stmts job and applicant details

		$job = $conn->prepare("DELETE FROM job WHERE id = ? ");
    $job->bind_param('s',$id);

		$applicant = "DELETE FROM applicant WHERE job_code = ? ";
    $applicant->bind_param('s',$code);

    //get details
    $id = $_POST['id'];
    $code = $_POST['code'];
    //get pass for challenge
		$pass = $_POST['pass'];
		$employee_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
			if($job->execute() && $applicant->execute()){
				$_SESSION['success'] = 'Job record deleted successfully';
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

	header('location: ../applicant.php');
	
?>