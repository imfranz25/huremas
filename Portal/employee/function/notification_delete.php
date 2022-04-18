<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

    // get id
		$id = $_POST['id'];
		$sql = $conn->prepare("DELETE FROM notification WHERE id = ? ");
    $sql->bind_param('s',$id);
		echo ($sql->execute())?1:0;

	}else if (isset($_POST['deleteAll'])) {

    // delete all notif -> based on type employee
		$employee_id = $user['employee_id'];
		$sql = $conn->prepare("DELETE FROM notification WHERE employee_id = ? AND type = 'employee' ");
    $sql->bind_param('s',$employee_id);
		$sql->execute();
		header('location: ../profile.php');

	} else {
    header('location: ../profile.php');
  }

?>