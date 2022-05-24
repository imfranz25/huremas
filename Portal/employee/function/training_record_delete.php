<?php
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['delete'])){

    //  get id
		$reference_no = $_POST['id'];

    //  prepared stmt
		$sql = $conn->prepare("DELETE FROM training_record WHERE reference_no = ? ");
    $sql->bind_param('s',$reference_no);

		if($sql->execute()){
			$_SESSION['success'] = 'Training Request cancelled successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Error';
		}
	}
	else{
		$_SESSION['error'] = 'Select item to cancel first';
	}

	header('location: ../training.php');
	
?>