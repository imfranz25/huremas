<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

  //prepare stmt select values
  $sql = $conn->prepare("SELECT * FROM deduction_vendor WHERE id = ? ");
  $sql->bind_param('d',$id);

	if(isset($_POST['id'])){
		
    global $id,$sql;

    //execute
    $id = $_POST['id'];
    $sql->execute();
    $result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row); // echo via json encode

	}
	else if(isset($_POST['ids'])){

    global $id,$sql;
    
		// initilization 
		$ids =$_POST['ids'];
		$name = array();

		for ($i=0; $i < count($ids); $i++) { 
			$id = $ids[$i];
			$sql->execute();
			$result = $sql->get_result();
			$user = $result->fetch_assoc();
			array_push($name, $user['vendor_name']);
		}
		echo json_encode($name);

	}else{
    header('location:../deduction.php');
  }

?>