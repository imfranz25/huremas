<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //prepared stmt
		$sql = $conn->prepare("DELETE FROM benefit_record WHERE id= ? ");
    $sql->bind_param('d',$record_id);
    //get id
    $record_id = $_POST['id'];

		echo ($sql->execute())?1:0;

	}else {
    header('location: ../benefits.php');
  }

?>