<?php
	include '../includes/session.php';

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
			$_SESSION['success'] = 'User created successfully';
		}
		else{
			$_SESSION['error'] = "User created unsuccessfully";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../users.php');
?>