<?php 
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

		// get id
		$id = $_POST['id'];

    // prepared stmt
		$progress = $conn->prepare("SELECT p.*,concat(u.firstname,' ',u.lastname) as uname,u.photo FROM task_progress p inner join task t on t.id = p.task_id inner join employees u on u.employee_id = t.employee_id where p.task_id = ? order by unix_timestamp(p.data_created) desc ");
    $progress->bind_param('s',$id);
    $progress->execute();
    $result = $progress->get_result();
		
		$rows=array();

		if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
      	array_push($rows,$row);
      }
		}
		echo json_encode($rows);
    
	}else {
    header('location: ../tasks.php');
  }

?>

