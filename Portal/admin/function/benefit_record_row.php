<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

		//prepared stmt select
		$sql = $conn->prepare("SELECT *,benefit_record.id AS brid, benefits.id AS bid 
            FROM benefit_record LEFT JOIN benefits 
            ON benefits.benefit_id=benefit_record.benefit_id 
            WHERE benefit_record.employee_id = ? ");
    $sql->bind_param('s',$emp_id);
    //get value then execute
    $emp_id = $_POST['id'];
    $sql->execute();
		$result = $sql->get_result();
		$output = array();
		while ($row = $result->fetch_assoc()) {
			array_push($output,$row);
		}
		echo json_encode($output);

	}else if (isset($_POST['pid'])) {

		//prepared stmt
		$sql = $conn->prepare("SELECT *, benefits.benefit_id AS bid, (SELECT COUNT(*) FROM benefit_record WHERE bid=benefit_record.benefit_id AND employee_id=?) AS count FROM benefits ");
    $sql->bind_param('s',$emp_id);
    //get value then execute
    $emp_id = $_POST['pid'];
    $sql->execute();
		$result = $sql->get_result();
		$output = array();

		while ($row = $result->fetch_assoc()) {
			if($row['count']==0){
				array_push($output,$row);
			}
		}
		echo json_encode($output);

	}else if (isset($_POST['bid'])) {

    //preapred stmt select
		$sql = $conn->prepare("SELECT * FROM benefit_record LEFT JOIN benefits ON benefits.benefit_id=benefit_record.benefit_id WHERE benefit_record.id = ? ");
    $sql->bind_param('d',$record_id);
    //get values
    $record_id = $_POST['bid'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);

	}

?>