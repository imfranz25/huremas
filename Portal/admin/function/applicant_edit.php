<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id']) && isset($_POST['stage']) && isset($_POST['code'])){
		
		//update query
		$sql = $conn->prepare("UPDATE applicant SET stage=? WHERE id=? ");
    $sql->bind_param('sd',$stage,$id);
    //get values
    $id = trim($_POST['id']);
    $stage = trim($_POST['stage']);
    $code = trim($_POST['code']);

		//check
		$check = $conn->prepare("SELECT *, (SELECT COUNT(stage) FROM applicant WHERE applicant.job_code = ? AND stage IN ('Hired','On-Board')  AS hired FROM job WHERE job.job_code = ?  ");
    $check->bind_param('ss',$code,$code);
    $check->execute();
    $result = $check->get_result();
    $row = $result->fetch_assoc();


    // IF STAGE == HIRED CHECK IF IT REACH ITS MAXIMUM APPLCIANTS 
    if ($stage == "Hired") {
    	if ($row['hired'] < $row['job_recruit']) {
  		  echo ($sql->execute()) ? 1 : 0;
    	}
    	else{
    		echo 2;
    	}
    }else{
    	echo ($sql->execute()) ? 1 : 0;
    }
		
	}else if (isset($_POST['id']) && isset($_POST['note'])) {

		$id = trim($_POST['id']);
		$note = trim($_POST['note']);
		//UPDATE
		$sql = $conn->prepare("UPDATE applicant SET notes=? WHERE id=? ");
    $sql->prepare('sd',$note,$id);
		//IF SOMETHING WENT WRONG SET THE PREVIOUS NOTES
		$select = $conn->prepare("SELECT notes FROM applicant WHERE id=? ");
    $select->bind_param('d',$id);
    $select->execute();
		$result = $select->get_result();
    $row = $result->fetch_assoc();
    //echo results
		echo ($sql->execute()) ? 1 : json_encode($row);

	}else if (isset($_POST['status_code'])) {

		$code = $_POST['status_code'];
		//update prepared stmt
		$stmt = $conn->prepare("UPDATE job SET job_status = ? WHERE job_code = ? ");
		$stmt->bind_param("ss", $status,$code);
		//check
		$check = $conn->prepare("SELECT *, (SELECT COUNT(stage) FROM applicant WHERE applicant.job_code = ? AND stage ='On-Board') AS hired FROM job WHERE job.job_code = ?  ");
    $check->bind_param('ss',$code,$code);
    $result = $check->get_result();
    $row = $result->fetch_assoc();

      if ($row['job_status']!='starred') {
      	$status = 'starred';
      	echo ($stmt->execute()) ? 1:2;
      }else{
      	$status = ($row['hired']==$row['job_recruit']) ? 'inactive': 'active' ;
      	echo ($stmt->execute()) ? 0:2;
      }
      // 1->STARRED, 0->ACTIVE/INACTIVE, 2->ERROR
      
	}else {
    header('location:../applicant.php');
  }
?>