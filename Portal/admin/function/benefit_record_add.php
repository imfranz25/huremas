<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['emp_id_ben'])){

		//insert prepared stmt
		$sql = $conn->prepare("INSERT INTO benefit_record (benefit_id,employee_id) VALUES (?,?)");
    $sql->bind_param('ss',$benefit_id,$employee_id)
    //get values
    $employee_id = $_POST['emp_id_ben'];
    $benefit_id = $_POST['benefit'];

		echo ($sql->execute())?1:0; //1 ok - 0 error

	}

?>