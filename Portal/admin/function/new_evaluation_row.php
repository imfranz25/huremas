<?php 
	include '../includes/session.php';

	if(isset($_POST['employee_id'])){
		$employee_id = $_POST['employee_id'];


		$sql = "SELECT * FROM task where employee_id = '$employee_id' and status = '2' and id not in (SELECT task_id FROM ratings)";
		$query = $conn->query($sql);

		$data = array();
		if($query->num_rows > 0){
              while($row = $query->fetch_assoc()){
              	$data[] = $row;
              }
		}

		echo json_encode($data);

	}

?>