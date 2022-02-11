<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		//delete action prepared stmt
		$sql = $conn->prepare("DELETE FROM disciplinary_action WHERE reference_id = ? ");
    $sql->bind_param('s',$id);
    //get details
    $id = $_POST['id'];
		$pass  = $_POST['pass'];
    $employee_id = $user['employee_id'];
    
    //challenge
    if (password_verify($pass,get_password($employee_id,$conn))) {
    	if ($sql->execute()) {
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