<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

  $stmt = $conn->prepare("SELECT * FROM deduction WHERE id = ? ");
  $stmt->bind_param("d", $id);

	if(isset($_POST['id'])){

    global $id,$stmt;

		// initilization 
		$id = $_POST['id'];
		$stmt->execute();
    $result = $stmt->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);
	}

	else if(isset($_POST['ids'])){
    
    global $id,$stmt;

		// initilization 
		$ids =$_POST['ids'];
		$name = array();

		for ($i=0; $i < count($ids); $i++) { 
			$id = $ids[$i];
			$stmt->execute();
			$result = $stmt->get_result();
			$user = $result->fetch_assoc();
			array_push($name, $user['deduction_name']);
		}
		echo json_encode($name);
	}


?>

