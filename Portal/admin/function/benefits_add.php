<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    $sql = $conn->prepare("INSERT INTO benefits (benefit_id,benefit_name, description) VALUES (?,?,?) ");
    $sql->bind_param('sss',$benefit_id,$name,$description);
    //get values
		$name = addslashes($_POST['title']);
		$description = addslashes($_POST['description']);
		//creating benefit_id
		$benefit_id = 'CVSUBEN'.generate_id();

		if($sql->execute()){
			$_SESSION['success'] = 'Benefit added successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../benefits.php');

?>