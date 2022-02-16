<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		

		$sql = $conn->prepare("SELECT a.*,CONCAT(e.lastname,', ',e.firstname,' ',e.middlename) AS name,a.id AS aid,e.id AS eid 
      FROM attendance a 
      LEFT JOIN employees e ON a.employee_id=e.employee_id 
      WHERE a.id = ? ");
    $sql->bind_param('s',$id);

    // get id 
    $id = $_POST['id'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);

	}else{
    header('location: ../dtr.php');
  }

?>

