<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if (isset($_POST['id'])) {

    // get id
		$id = $_POST['id'];
    // update prpared stmt
		$sql = $conn->prepare("UPDATE notification SET open=1 WHERE id= ? ");
    $sql->bind_param('d',$id);
		echo ($sql->execute())?1:0;

	} else {
    header('location: ../profile.php');
  }

?>