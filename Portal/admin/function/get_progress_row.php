<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['task_id'])){
		$task_id = $_POST['task_id'];


		$sql = "SELECT p.*,concat(u.firstname,' ',u.lastname) as uname,u.photo FROM task_progress p inner join task t on t.id = p.task_id inner join employees u on u.employee_id = t.employee_id where p.task_id = '$task_id' order by unix_timestamp(p.data_created) desc ";
		$query = $conn->query($sql);

		$data = array();
		if($query->num_rows > 0){
              while($row = $query->fetch_assoc()){
              	$row['uname'] = ucwords($row['uname']);
				$row['progress'] = html_entity_decode($row['progress']);
				$row['data_created'] = date("M d, Y",strtotime($row['data_created']));
				$data[] = $row;
              }
		}

		echo json_encode($data);

	}

?>

