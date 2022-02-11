<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		//update prepared stmt
		$sql = $conn->prepare("UPDATE benefits SET description = ?, benefit_name = ? 
            WHERE id = ? ");
    $sql->bind_param('sss',$description,$title,$id);
    //get values
    $id = $_POST['id'];
    $title = addslashes($_POST['title']);
    $description = addslashes($_POST['description']);
		if($sql->execute()){
			$_SESSION['success'] = 'Benefit updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:../benefits.php');

?>