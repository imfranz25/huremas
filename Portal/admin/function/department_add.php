<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
		$title = addslashes($_POST['title']);
		$rate = $_POST['code'];

		$sql = $conn->prepare("INSERT INTO department_category (title, code) VALUES (?, ?)");
    $sql->bind_param('ss',$title,$rate);
		if($sql->execute()){
			$_SESSION['success'] = 'Department added successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../position.php');

?>