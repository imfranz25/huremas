<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

		// get id
		$id = $_POST['id'];
    //prepared stmt
		$sql = "SELECT * FROM attendance WHERE id = ? ";
    $sql->bind_param('s',$id);
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);

	} else {
    header('location: ../dtr.php');
  }

?>

