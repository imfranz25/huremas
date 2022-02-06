<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM events WHERE reference_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}else if(isset($_POST['ids'])){
		// initilization shit
		$ids =$_POST['ids'];
		$event_name = array();
		$stmt = $conn->prepare("SELECT * FROM events WHERE reference_id = ? ");
		$stmt->bind_param("s", $id);

		for ($i=0; $i < count($ids); $i++) { 
			$id = $ids[$i];
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			array_push($event_name, $row['event_name']);
		}
		echo json_encode($event_name);
	}
?>