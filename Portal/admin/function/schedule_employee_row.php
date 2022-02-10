<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
    //prepare stmt
    $sql = $conn->prepare("SELECT *, employees.id AS empid FROM employees 
            LEFT JOIN schedules ON schedules.id=employees.schedule_id 
            WHERE employees.id = ? ");
    $sql->bind_param('s',$id);
    //execute
		$id = $_POST['id'];
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);
	}
?>