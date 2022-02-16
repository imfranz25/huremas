<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //select prepared stmt
		$sql = $conn->prepare("SELECT r.*,CONCAT(e.lastname,', ',e.firstname,' ',e.middlename) AS name,t.task,
      ((((r.efficiency + r.timeliness + r.quality + r.accuracy)/4)/5) * 100) AS pa 
      FROM ratings r INNER JOIN employees e ON e.employee_id = r.employee_id 
      INNER JOIN task t ON t.id = r.task_id  WHERE r.id = ? ");
    $sql->bind_param('d',$id);

    //get id
    $id = $_POST['id'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();
		$row['pa'] = number_format($row['pa'],2).'%';

		echo json_encode($row);

	}else{
    header('location: ../performance_eval.php?page=evaluation');
  }

?>