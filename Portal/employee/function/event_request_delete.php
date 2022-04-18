<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['delete'])){

		// get id
		$id = $_POST['reference_id'];
    // prepared stmt
		$sql = $conn->prepare("DELETE FROM event_request WHERE reference_id = ? ");
    $sql->bind_param('s',$id);

		if($sql->execute()){
			$_SESSION['success'] = 'Event Request successfully cancelled';
		}else{
			$_SESSION['error'] = 'Event Request cancellation failed';
		}

	}
	header('location: ../events.php');


?>

