<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['employee_id'])){

    //prepared stmt
		$sql = $conn->prepare("SELECT * FROM task 
      WHERE employee_id = ? 
      AND status = '2' AND id 
      NOT IN (SELECT task_id FROM ratings)");
    $sql->bind_param('s',$employee_id);
    //get id
    $employee_id = $_POST['employee_id'];
    $sql->execute();
		$result = $sql->get_result();

		$data = array();
		if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
      	$data[] = $row;
      }
		}

		echo json_encode($data);

	}else{
    location('location: ../task.php');
  }

?>