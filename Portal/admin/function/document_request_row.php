<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['request_by'])){
		
    //prepared stmt
		$sql=$conn->prepare("SELECT * FROM document_request LEFT JOIN employees ON employees.employee_id=document_request.employee_id WHERE request_by= ?");
		$sql->bind_param('s',$request_by);
		$request_by = trim($_POST['request_by']);

		$sql->execute();

		$result = $sql->get_result(); 

		$rows=array();
		while ($row = $result->fetch_assoc()) {
			array_push($rows,$row);
		}
		echo json_encode($rows);

	}else if ($_POST['request_id']) {

    //prepared 
		$sql=$conn->prepare("SELECT * FROM document_request LEFT JOIN employees ON employees.employee_id=document_request.employee_id WHERE reference_id=? ");
    $sql->bind_param('s',$reference_id);
    //get id
    $reference_id = $_POST['request_id'];
    $sql->execute();
		$result = $sql->get_result();
		$row=$result->fetch_assoc();
		$row['file_hash']= password_hash($reference_id, PASSWORD_DEFAULT);
		echo json_encode($row);

	}else{
    header('location:../documents.php');
  }  

?>