<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    // prepared stmt
		$sql = $conn->prepare("SELECT * FROM position WHERE id = ? ");
    $sql->bind_param('s',$id);

    // get id
    $id = $_POST['id'];
    $sql->execute();

		$query = $sql->get_result();
		$row = $query->fetch_assoc();

		echo json_encode($row);
    
	} else {
    header('location:../position.php');
  }

?>