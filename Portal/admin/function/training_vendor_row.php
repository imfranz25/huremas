<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //get id
		$id = $_POST['id'];
    // prepared stmt
		$sql = $conn->prepare("SELECT * FROM training_vendor WHERE id = ? ");
    $sql->bind_param('d',$id);
    $sql->execute();
    // fetch data
		$query = $sql->get_result();
		$row = $query->fetch_assoc();

		echo json_encode($row);

	}else if(isset($_POST['ids'])){
		// initilization shit
		$ids =$_POST['ids'];
		$vendor_name = array();
		$stmt = $conn->prepare("SELECT * FROM training_vendor WHERE id = ? ");
		$stmt->bind_param("d", $id);

		for ($i=0; $i < count($ids); $i++) { 
			$id = $ids[$i];
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			array_push($vendor_name, $row['vendor_name']);
		}
		echo json_encode($vendor_name);
	} else {
    header('location: ../training_vendor.php');
  }
?>