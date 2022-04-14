<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //get details
		$id = $_POST['id'];
		$step = $_POST['step'];
    // prepared stmt
    $sql = $conn->prepare("SELECT $step as res FROM ssl_table WHERE salary_grade = ? ");
    $sql->bind_param('s',$id);
		$sql->execute();
    //fetch data
		$query = $sql->get_result();
		$row = $query->fetch_assoc();
		echo json_encode($row);
	} else {
    header('location:schedule.php');
  }
?>