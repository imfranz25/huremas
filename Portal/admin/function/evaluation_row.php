<?php 
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$sql = "SELECT r.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,t.task,((((r.efficiency + r.timeliness + r.quality + r.accuracy)/4)/5) * 100) as pa FROM ratings r inner join employees e on e.employee_id = r.employee_id inner join task t on t.id = r.task_id  where r.id = $id";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$row['pa'] = number_format($row['pa'],2).'%';

		echo json_encode($row);
	}
?>