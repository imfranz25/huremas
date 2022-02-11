<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //prepared stmt
    $sql = $conn->prepare("INSERT INTO disciplinary_category (title, cat_type,details) VALUES (?, ?, ?)");
    $sql->bind_param('sss',$title,$cat_type,$details);
		//get values
		$title = addslashes($_POST['title']);
		$cat_type = addslashes($_POST['cat_type']);
		$details = addslashes($_POST['details']);

		if($sql->execute()){
			$_SESSION['success'] = 'Disciplinary category added successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../disciplinary.php');

?>