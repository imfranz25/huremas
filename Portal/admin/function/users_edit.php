<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';
    require_once 'sendEmail.php';
    
	if(isset($_POST['edit'])){
		$type = $_POST['type'];
		$aid = $_POST['aid'];
		
		$sql = "UPDATE admin SET type = '$type' WHERE id = $aid ";
		
		if($conn->query($sql)){
			$_SESSION['success'] = 'User record updated successfully';
		}
		else{
			$_SESSION['error'] = "User record updated unsuccessfully";
		}


	}else if(isset($_POST['reset'])){
		$aid = $_POST['aid'];

		$sql = "SELECT default_password FROM admin  WHERE id = '$aid'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$hashed_password = password_hash($row['default_password'], PASSWORD_DEFAULT);
		$sql = "UPDATE admin SET password = '$hashed_password' WHERE id = $aid ";
		if($conn->query($sql)){
		    $sql1 = "SELECT * FROM admin a LEFT JOIN employees e ON e.employee_id=a.employee_id  WHERE a.id='$aid'";
		    $query = $conn->query($sql1);
		    $row = $query->fetch_assoc();
		    
		    $gmail = $row['email'];
		    $username = $row['username'];
		    $default=$row['default_password'];
		    
		    $subject="Account Password Reset";
		    $message = "Hello!,<br><br>Your account password has been reset  <br>Username: ".$username."<br>Default Password: ".$default." <br><br>Please change your password immediately!";
		    
		    $res= sendEmail($gmail,$subject,$message);
		    
		    
		    
			$_SESSION['success'] = $res.' User password reset successfully';
		}else{
			$_SESSION['error'] = $res." User password reset unsuccessfully";
		}
		
	

	}
	else{
		$_SESSION['error'] = 'Select user record to edit first';
	}

	header('location: ../users.php');
?>