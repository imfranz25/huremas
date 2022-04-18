<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['delete'])){

    // get id
		$id = $_POST['id'];

		$sql = $conn->prepare("DELETE FROM attendance WHERE id = ? ");
    $sql->bind_param('s',$id);

		if($sql->execute()){
			$_SESSION['success'] = 'Attendance deleted successfully';
		}
		else{
			$_SESSION['error'] = "Connection Time-out";
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../dtr.php');
	
?>