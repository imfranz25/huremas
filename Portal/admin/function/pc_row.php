<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		$id = $_POST['id'];
		$sql = $conn->prepare("SELECT * FROM payroll_coverage_table WHERE pay_code = ? ");
    $sql->bind_param("s", $id);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();

		echo json_encode($row);

	}
?>