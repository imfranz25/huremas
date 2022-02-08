<?php 
  require_once '../../includes/path.php';
	require_once '../includes/session.php';

  //prepared stmt events select
  $get_events = $conn->prepare("SELECT * FROM events WHERE reference_id = ? ");
  $get_events->bind_param('s',$id);

	if(isset($_POST['id'])){
    global $get_events;
    
		$id = $_POST['id'];
    $get_events->execute();
    $result = $get_events->get_result();
    $row = $result->fetch_assoc();
		echo json_encode($row);

	}else if(isset($_POST['ids'])){
    global $get_events;

		// initilization 
		$ids =$_POST['ids'];
		$event_name = array();

    //get all rows and push it to array -> encode as JSON
		for ($i=0; $i < count($ids); $i++) { 
			$id = $ids[$i];
			$get_events->execute();
			$result = $get_events->get_result();
			$row = $result->fetch_assoc();
			array_push($event_name, $row['event_name']);
		}
		echo json_encode($event_name);

	}else{
    header('location:../events.php');
  }

?>