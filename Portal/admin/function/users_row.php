<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		// get id 
		$id = $_POST['id'];
    // prepared stmt
		$sql = $conn->prepare("SELECT a.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,a.id as aid FROM admin a inner join employees e on a.employee_id=e.employee_id WHERE a.id = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
    // fetch details
		$query = $sql->get_result();
		$row = $query->fetch_assoc();

		echo json_encode($row);

	} else {
    header('location: ../users.php');
  }


?>

