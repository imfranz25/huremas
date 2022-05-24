<?php 
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

		// get id
		$id = $_POST['id'];

    // prepared stmt
		$progress = $conn->prepare("SELECT *,p.id as pid FROM task_progress p left join task t on t.id = p.task_id where p.id = ? ");
    $progress->bind_param('s',$id);
    $progress->execute();
    $result = $progress->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);
    
	}else {
    header('location: ../tasks.php');
  }

?>

