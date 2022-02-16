<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //prepared stmt deduc emp
		$sql = $conn->prepare("SELECT * FROM deduction_employee 
      LEFT JOIN deduction ON deduction.id=deduction_employee.deduction_id
      WHERE employee_id = ? ");
    $sql->bind_param('s',$id);
    //get id
    $id = $_POST['id'];
    $sql->execute();
		$result = $sql->get_result();
		$output = array();

		while ($row = $result->fetch_assoc()) {
			array_push($output,$row);
		}
		echo json_encode($output);

	}else{
    header('location: ../employee.php?page=employee_list');
  }
  
?>