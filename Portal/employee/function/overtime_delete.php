<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['delete'])){

    //get id
		$id = $_POST['id'];
    // prepared stmt
		$sql = $conn->prepare("DELETE FROM overtime_request WHERE id = ? ");
    $sql->bind_param('s',$id);

		if($sql->execute()){
			$_SESSION['success'] = 'Overtime request deleted successfully';
		}
		else{
			$_SESSION['error'] = 'Overtime request deleted unsuccessfully';
		}
    
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../overtime.php');
	
?>