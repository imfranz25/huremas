<?php
session_start();
	include '../Database/conn.php';

	if(isset($_POST['login'])){
        
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE username = '$username'";

		$query = $conn->query($sql);

		if($query->num_rows < 1){
            $_SESSION['error'] = 'Cannot find account with the username';

		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$id = $row['employee_id'];
				$check_archive = "SELECT employee_archive FROM employees WHERE employee_id = '$id'";
				$check_query = $conn->query($check_archive);
				$archive_row = $check_query->fetch_assoc();
				// CONTINUE TO EMPLOYEE PAGE -> EMPLOYEE IS NOT IN ARCHIVED
				if ($archive_row['employee_archive'] == 0 ) {
					$_SESSION['id'] = $row['employee_id'];
					$_SESSION['type'] = $row['type'];
				}else{
					$_SESSION['error'] = 'Sorry your account is not active at the moment, please contact your administrator';
				}

			}
			else{
                $_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
        $_SESSION['error'] = 'Input admin credentials first';
	}
    
    header("location: index.php");


?>