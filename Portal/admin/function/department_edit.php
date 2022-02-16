<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    //update dep cat prepared stmt
		$sql = $conn->prepare("UPDATE department_category SET title = ?, code = ? WHERE id = ? ");
    $sql->bind_param('sss',$title,$rate,$id);
    //get values
    $id = $_POST['id']; 
    $title = addslashes($_POST['title']);
    $rate = $_POST['code'];

		if($sql->execute()){
			$_SESSION['success'] = 'Department updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:../position.php');

?>