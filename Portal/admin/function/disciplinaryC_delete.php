<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

		$id = addslashes($_POST['id']);

		$check = "SELECT COUNT(*) FROM disciplinary_action WHERE reason = $id ";
		$query = $conn->query($check);
		$row = $query->fetch_assoc();
		$count = $row['COUNT(*)'];
		

		if ($count==0) {
			$sql = "DELETE FROM disciplinary_category WHERE id = $id ";
			
			$pass  = $_POST['pass'];
            $employee_id = $user['employee_id'];
            
            //challenge
            if (password_verify($pass,get_password($employee_id,$conn))) {
            	if($conn->query($sql)){
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