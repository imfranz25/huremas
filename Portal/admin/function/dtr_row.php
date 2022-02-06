<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		// initilization shit
		$id = $_POST['id'];
		$sql = "SELECT a.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,a.id as aid,e.id as eid FROM attendance a left join employees e on a.employee_id=e.employee_id WHERE a.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}

?>

