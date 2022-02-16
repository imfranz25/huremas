<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['task_id'])){

    //select prepared stmt
		$sql = $conn->prepare("SELECT p.*,concat(u.firstname,' ',u.lastname) 
      AS uname,u.photo FROM task_progress p 
      INNER JOIN task t ON t.id = p.task_id 
      INNER JOIN employees u ON u.employee_id = t.employee_id 
      WHERE p.task_id = ? ORDER BY unix_timestamp(p.data_created) DESC ");
    $sql->bind_param('s',$task_id);
    //get id
    $task_id = $_POST['task_id'];
    $sql->execute();
		$result = $sql->get_result();

		$data = array();
		if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
      	$row['uname'] = ucwords($row['uname']);
        $row['progress'] = html_entity_decode($row['progress']);
        $row['data_created'] = date("M d, Y",strtotime($row['data_created']));
        $data[] = $row;
      }
		}

		echo json_encode($data);

	}

?>

