<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		//prepared stmt
		$sql = $conn->prepare("SELECT * FROM employees LEFT JOIN position ON position.id=employees.position_id LEFT JOIN department_category ON department_category.id=employees.department_id WHERE employee_id = ? ");
    $sql->bind_param('s',$id)
    //get id
    $id = $_POST['id'];
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);
	}else{
    header('location: ../disciplinary.php');
  }
?>