<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		//prepared stmt
		$sql = $conn->prepare("SELECT * FROM event_request WHERE reference_id = ? ");
    $sql->bind_param('s',$id);

    //execute stmt
    $id = $_POST['id'];
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);

	}else {
    header('location: ../events.php');
  }

?>