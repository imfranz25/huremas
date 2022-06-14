<?php
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

    // get id
		$id = $_POST['id'];
	
    $sql = $conn->prepare("SELECT * FROM cash_advance WHERE id=? ");
    $sql->bind_param('d',$id);
		$sql->execute();
		$query = $sql->get_result();
		$row = $query->fetch_assoc();

		echo json_encode($row);

	}	else {
    header('location: ../cash_advance.php');
  }
	

?>