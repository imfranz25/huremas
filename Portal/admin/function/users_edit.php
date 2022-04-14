<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';
    require_once 'sendEmail.php';
    
	if(isset($_POST['edit'])) {

    // get details
		$type = $_POST['type'];
		$aid = $_POST['aid'];
		
    // prepared stmt
		$sql = $conn->prepare("UPDATE admin SET type = ? WHERE id = ? ");
		$sql->bind_param('sd',$type,$aid);

		if($sql->execute()){
			$_SESSION['success'] = 'User record updated successfully';
		}
		else{
			$_SESSION['error'] = "User record updated unsuccessfully";
		}

	} else if(isset($_POST['reset'])) {

    // get id
		$aid = $_POST['aid'];

    // prepared stmt
		$sql = $conn->prepare("SELECT default_password FROM admin  WHERE id = ? ");
    $sql->bind_param('s',$aid);
    $sql->execute();
		$query = $sql->get_result();
		$row = $query->fetch_assoc();

    // hash pass
		$hashed_password = password_hash($row['default_password'], PASSWORD_DEFAULT);

    // prepared stmt
		$sql = $conn->prepare("UPDATE admin SET password = ? WHERE id =?  ");
    $sql->bind_param('sd',$hashed_password,$aid);

		if($sql->execute()){

      // prepared stmt
	    $sql1 = $conn->prepare("SELECT * FROM admin a LEFT JOIN employees e ON e.employee_id=a.employee_id  WHERE a.id=? ");
      $sql1->bind_param('s',$aid);
      $sql1->execute();
	    $query = $sql1->get_result();
	    $row = $query->fetch_assoc();
	    
      // fetch details
	    $gmail = $row['email'];
	    $username = $row['username'];
	    $default=$row['default_password'];
	    
      // compose letter
	    $subject="Account Password Reset";
	    $message = "Hello!,<br><br>Your account password has been reset  <br>Username: ".$username."<br>Default Password: ".$default." <br><br>Please change your password immediately!";
	    // send email
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