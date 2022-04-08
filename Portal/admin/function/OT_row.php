<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //prepared stmt
		$sql = $conn->prepare("SELECT orec.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,orec.id as oids,o.overtime_name as otname,o.overtime_rate as ors FROM overtime_request orec LEFT JOIN employees e ON e.employee_id=orec.employee_id LEFT JOIN overtime o on orec.overtime_code=o.id WHERE orec.id = ? ");
    $sql->bind_param('s',$id);
    //get id
    $id = $_POST['id'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);
	}else{
    header('location: ../overtime.php');
  }
?>