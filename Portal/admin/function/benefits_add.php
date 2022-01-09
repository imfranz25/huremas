<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
		$name = addslashes($_POST['title']);
		$description = addslashes($_POST['description']);

		//creating benefit_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$benefit_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

		$sql = "INSERT INTO benefits (benefit_id,benefit_name, description) VALUES ('CVSUBEN$benefit_id','$name', '$description')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Benefit added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../benefits.php');

?>