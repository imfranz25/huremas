<?php
	include '../includes/session.php';

	if(isset($_POST['update'])){
		$a1 = $_POST['rid'];
		$a3 = $_POST['efficiency'];
		$a4 = $_POST['timeliness'];
		$a5 = $_POST['quality'];
		$a6 = $_POST['accuracy'];
		$a7 = $_POST['remarks'];

	

		$sql = "UPDATE ratings SET `efficiency`='$a3',`timeliness`='$a4',`quality`='$a5',`accuracy`='$a6',`remarks`='$a7' WHERE id='$a1'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Evaluation updated successfully ' ;
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../performance_eval.php?page=evaluation');
	

?>