<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

    
	if(isset($_POST['id'])){
        
		$id = $_POST['id'];
		$sql = $conn->prepare("SELECT *, employees.id as empid FROM employees 
      LEFT JOIN department_category dc ON dc.id=department_id
      LEFT JOIN employment_category ec ON ec.id=category_id
      LEFT JOIN position ON position.id=position_id
      WHERE employees.id = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);
        
	}else{
    header('location:../employee.php');
  }

?>