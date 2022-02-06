<?php

	session_start();
	require_once 'includes/path.php';
	require_once $_SERVER['DOCUMENT_ROOT'].$global_link.'/Database/conn.php';
	require_once 'sendEmail.php';

	if(isset($_POST['reset'])){
        
		//prepared statement
		$stmt = $conn->prepare("SELECT * FROM admin a LEFT JOIN employees e 
														ON a.employee_id=e.employee_id WHERE username = ? ");
		$stmt->bind_param('s',$username);

		//get values
		$username = $_POST['username'];
		$email = $_POST['email'];

		//execute
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows < 1){
      $_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $result->fetch_assoc(); // get infos
			if($email==$row['email']){
				$id = $row['employee_id']; //get id and check if the employee is already archived
				$check_archive = "SELECT employee_archive FROM employees 
													WHERE employee_id = '$id'";
				$check_query = $conn->query($check_archive);
				// CONTINUE TO EMPLOYEE PAGE -> EMPLOYEE IS NOT IN ARCHIVED
				if ($check_query->num_rows > 0 ) {
				  //fetch values
					$gmail = $row['email'];
			    $username = $row['username'];
			    $default=$row['default_password'];
			    $hashed_password = password_hash($row['default_password'], PASSWORD_DEFAULT);
			    $sql1 = "UPDATE admin SET password = '$hashed_password' WHERE employee_id = '$id' ";
			    $conn->query($sql1);
			    //set email
			    $subject="Account Password Reset";
			    $message = "Hello!,<br><br>Your account password has been reset  <br>Username: ".$username."<br>Default Password: ".$default." <br><br>Please change your password immediately!";
			    $res= sendEmail($gmail,$subject,$message);
			    $_SESSION['success'] = $res;
				    
				}else{
					$_SESSION['error'] = 'Sorry your account is not active at the moment, please contact your administrator';
				}
			}else{
        $_SESSION['error'] = 'Incorrect email';
			}
		}
		
	}else{
    $_SESSION['error'] = 'Fill up the form first';
	}
    
  header("location: forgot.php");

?>