<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM disciplinary_action WHERE reference_id = '$id' ";

		
		$pass  = $_POST['pass'];
        $employee_id = $user['employee_id'];
        
        //challenge
        if (password_verify($pass,get_password($employee_id,$conn))) {
        	if ($conn->query($sql)) {
        		$_SESSION['success'] = 'Disciplinary Action deleted successfully';
        	}else{
        		$_SESSION['error'] = 'Connection Timeout';
        	}
        }else{
        	 $_SESSION['error'] = 'Incorrect Password, please try again';
        }

	}
	header('location: ../disciplinary.php');
?>