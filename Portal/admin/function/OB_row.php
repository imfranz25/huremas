<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //prepared stmt
		$sql = $conn->prepare("SELECT orec.*,
      CONCAT(e.lastname,', ',e.firstname,' ',e.middlename) AS name,
      orec.id AS oids 
      FROM allowance orec 
      LEFT JOIN employees e ON e.employee_id=orec.employee_id 
      WHERE orec.id = ? ");
    $sql->bind_param('s',$id);
    //get id
    $id = $_POST['id'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);

	}else{
    header('location: ../official_business.php');
  }

?>