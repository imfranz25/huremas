<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){

    //prepared stmt 
		$sql = $conn->prepare("SELECT *, job.id AS jid FROM job 
        LEFT JOIN position ON position.id=job.job_position 
        LEFT JOIN department_category dc ON dc.id=job.job_dept
        WHERE job.id = ? ");
    $sql->bind_param('s',$id);
    //get id then execute
    $id = $_POST['id'];
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();

		echo json_encode($row);

	}else{
    header('location: ../applicant.php');
  }

?>