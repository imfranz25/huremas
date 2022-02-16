<?php 
	require_once '../../includes/path.php';
	require_once($_SERVER['DOCUMENT_ROOT'].$global_link."/Portal/admin/includes/session.php");

  if (isset($_SESSION["id"])) {

    //select emp details
    $sql = $conn->prepare("SELECT * FROM employees 
        LEFT JOIN position ON position.id=employees.position_id 
        LEFT JOIN department_category dc ON dc.id=employees.department_id 
        LEFT JOIN employment_category ec ON ec.id=employees.category_id 
        LEFT JOIN admin ON admin.employee_id=employees.employee_id 
        WHERE employees.employee_id = ? ");
    $sql->bind_param('s',$id);
    //sample ID
    $id =$_SESSION["id"];
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();

    echo json_encode($row);

  }else{
    header('location: ../profile.php');
  }

	
?>