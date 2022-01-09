<?php 
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM training_course WHERE id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
	else if(isset($_POST['ids'])){
		// initilization shit
		$ids =$_POST['ids'];
		$name = array();
		$stmt = $conn->prepare("SELECT * FROM training_course WHERE id = ? ");
		$stmt->bind_param("d", $id);

		for ($i=0; $i < count($ids); $i++) { 
			$id = $ids[$i];
			$stmt->execute();
			$result = $stmt->get_result();
			$title = $result->fetch_assoc();
			array_push($name, $title['course_title']);
		}
		echo json_encode($name);
	}
?>