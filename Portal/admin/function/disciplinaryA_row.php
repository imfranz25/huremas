<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		// select prepared stmt
		$sql = $conn->prepare("SELECT * FROM disciplinary_action LEFT JOIN disciplinary_category ON disciplinary_category.id=disciplinary_action.reason LEFT JOIN employees ON  employees.employee_id=disciplinary_action.employee_id  WHERE reference_id = ? ");
    $sql->bind_param('s',$id);
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