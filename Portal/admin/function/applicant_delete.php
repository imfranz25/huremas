<?php
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$pass = $_POST['pass'];
		$employee_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
			$sql = "DELETE FROM applicant WHERE id = '$id' ";
			echo ($conn->query($sql))? 1:0;
		}else{
			echo 2;
		}
		
	}
?>