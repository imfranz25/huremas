<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){
		$pass  = $_POST['pass'];
        $employee_id = $user['employee_id'];
        
        //challenge
        if (password_verify($pass,get_password($employee_id,$conn))) {
            $id = $_POST['id'];
		    $sql = "DELETE FROM attendance WHERE id = '$id'";
        	if($conn->query($sql)){
    			$_SESSION['success'] = 'Attendance deleted successfully';
    		}
    		else{
    			$_SESSION['error'] = $conn->error;
    		}
        }else{
        	 $_SESSION['error'] = 'Incorrect Password, please try again';
        }
		
		
		
		
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}


	header('location: ../dtr.php');
	
?>