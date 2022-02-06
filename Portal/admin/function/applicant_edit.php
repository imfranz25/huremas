<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id']) && isset($_POST['stage']) && isset($_POST['code'])){
		$id = trim($_POST['id']);
		$stage = trim($_POST['stage']);
		$code = trim($_POST['code']);

		//update query
		$sql = "UPDATE applicant SET stage='$stage' WHERE id=$id ";

		//check
		$check = "SELECT *, (SELECT COUNT(stage) FROM applicant WHERE applicant.job_code = '$code' AND (stage='Hired' OR stage='On-Board')) AS hired FROM job WHERE job.job_code = '$code'  ";
        $query = $conn->query($check);
        $row = $query->fetch_assoc();


        // IF STAGE == HIRED CHECK IF IT REACH ITS MAXIMUM APPLCIANTS 
        if ($stage == "Hired") {
        	if ($row['hired'] < $row['job_recruit']) {

				echo ($conn->query($sql)) ? 1 : 0;
			}
			else{
				echo 2;
			}
        }else{
        	echo ($conn->query($sql)) ? 1 : 0;
        }
		
	}else if (isset($_POST['id']) && isset($_POST['note'])) {
		$id = trim($_POST['id']);
		$note = trim($_POST['note']);
		//UPDATE
		$sql = "UPDATE applicant SET notes='$note' WHERE id=$id ";
		//IF SOMETHING WENT WRONG SET THE PREVIOUS NOTES
		$select = "SELECT notes FROM applicant WHERE id=$id ";
		$query = $conn->query($select);
        $row = $query->fetch_assoc();
        //echo results
		echo ($conn->query($sql)) ? 1 : json_encode($row);
	}else if (isset($_POST['status_code'])) {
		$code = $_POST['status_code'];
		//update prepared stmt
		$stmt = $conn->prepare("UPDATE job SET job_status = ? WHERE job_code = '$code' ");
		$stmt->bind_param("s", $status);
		//check
		$check = "SELECT *, (SELECT COUNT(stage) FROM applicant WHERE applicant.job_code = '$code' AND stage ='On-Board') AS hired FROM job WHERE job.job_code = '$code'  ";
        $query = $conn->query($check);
        $row = $query->fetch_assoc();

        if ($row['job_status']!='starred') {
        	$status = 'starred';
        	echo ($stmt->execute()) ? 1:2;
        }else{
        	$status = ($row['hired']==$row['job_recruit']) ? 'inactive': 'active' ;
        	echo ($stmt->execute()) ? 0:2;
        }
      
        // 1->STARRED, 0->ACTIVE/INACTIVE, 2->ERROR
	}
?>