<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		// initilization
		$id = $_POST['id'];
		$sql = $conn->prepare("SELECT *, task.id as tid FROM task left join employees e on e.employee_id=task.employee_id WHERE task.id = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);
	} else {
    header('location: ../tasks.php');
  }

?>

