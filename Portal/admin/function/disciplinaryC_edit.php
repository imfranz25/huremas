<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
    //prepared stmt
    $sql = $conn->prepare("UPDATE disciplinary_category SET title=?, cat_type=?, details=? WHERE id = ? ");
    $sql->bind_param('ssss',$title,$cat_type,$details,$id);
    //get values
		$id = addslashes($_POST['id']);
		$title = addslashes($_POST['title']);
		$cat_type = addslashes($_POST['cat_type']);
		$details = addslashes($_POST['details']);

		if($sql->execute()){
			$_SESSION['success'] = 'Disciplinary category updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../disciplinary.php');

?>