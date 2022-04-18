<?php 
  require_once("../../includes/path.php");
	require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

		// get id
		$id = $_POST['id'];
    // prepared stmt
		$progress = $conn->prepared("SELECT * FROM attendance_correction WHERE attendance_id = ? ORDER BY unix_timestamp(date_created) DESC ");
    $progress->bind_param('s',$id);
    $progress->execute();
    $result = $progress->get_result();

		
		$rows=array();

		if($progress->num_rows > 0){
      while($row = $result->fetch_assoc()){
      	array_push($rows,$row);
      }
		}
		echo json_encode($rows);

	} else {
    header('location: ../dtr.php');
  }



?>

