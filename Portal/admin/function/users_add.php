<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';
	require_once 'sendEmail.php';

	if(isset($_POST['add'])){
		$employee_id = $_POST['employee_id'];
		$username = $_POST['username'];
		$type = $_POST['type'];

		//creating default password
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$default = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		$default = substr(str_shuffle($default), 0, 15);
		$hashed_password = password_hash($default, PASSWORD_DEFAULT);


		$sql = "INSERT INTO admin (`employee_id`, `username`, `password`, `default_password`, `type`) VALUES ('$employee_id','$username','$hashed_password','$default','$type')";	
		
		if($conn->query($sql)){
		    
		    $sql1 = "SELECT * FROM employees WHERE employee_id='$employee_id'";
		    $query = $conn->query($sql1);
		    $row = $query->fetch_assoc();
		    
		    $gmail = $row['email'];
		    $subject="Account Created";
		    $message = "Hello!,<br><br>You may now login at : http://huremas-cvsuic.online/Portal  <br>Username: ".$username."<br>Default Password: ".$default." <br><br>Please change your password immediately!";
		    
		    $res= sendEmail($gmail,$subject,$message);
		    
		    
		    
		    
		    
			$_SESSION['success'] = $res.' User created successfully';
		}
		else{
			$_SESSION['error'] = "User created unsuccessfully";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../users.php');
?>