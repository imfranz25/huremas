<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		$id = $_POST['id'];
		$sql = $conn->prepare("SELECT ac.*,ac.id as acid,a.time_in as tin, a.time_out as tout from attendance_correction ac inner join attendance a on a.id=ac.attendance_id  WHERE ac.id = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
		$query = $sql->get_result();
		$row = $query->fetch_assoc();
		echo json_encode($row);
    
	}
?>