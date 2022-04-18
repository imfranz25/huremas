<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

		// get id
		$id = $_POST['id'];
    // prepared stmt
		$sql = $conn->prepare("SELECT * FROM event_request  WHERE reference_id = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
		$query = $sql->get_result();
		$row = $query->fetch_assoc();

		echo json_encode($row);
	} else {
    header('location: ../events.php');
  }


?>

