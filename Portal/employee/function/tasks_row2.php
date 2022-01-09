<?php 
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$progress = $conn->query("SELECT p.*,concat(u.firstname,' ',u.lastname) as uname,u.photo FROM task_progress p inner join task t on t.id = p.task_id inner join employees u on u.employee_id = t.employee_id where p.task_id = '$id' order by unix_timestamp(p.data_created) desc ");

		
		$rows=array();

		if($progress->num_rows > 0){
              while($row = $progress->fetch_assoc()){
              	array_push($rows,$row);
              }
		}
		echo json_encode($rows);
	}



?>

