<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    //get values
		$id = trim($_POST['id']);
		$title = trim($_POST['title']);
		$position = trim($_POST['position']);
		$recruit = trim($_POST['recruit']);
		$department = trim($_POST['department']);
		$term = trim($_POST['term']);
		$type = trim($_POST['type']);
		$exp = trim($_POST['exp']);
		$grade = trim($_POST['grade']);
		$desc = trim($_POST['desc']);


		$sql = $conn->prepare("UPDATE job SET job_title=?, job_position=?, job_recruit=?, job_dept=? , job_term=?, job_type=?, job_exp=?, job_grade=?, job_desc=? WHERE id=? ");
    $sql->bind_param('sddssssdsd',$title,$position,$recruit,$department,$term,$type,$exp,$grade,$desc,$id);

		$check = $conn->prepare("SELECT *, job.id AS jid, (SELECT COUNT(stage) FROM  applicant WHERE job_code = job.job_code AND stage='On-Board') AS onboard FROM job WHERE id=?  ");
    $check->bind_param('d',$id);
    $check->execute();
		$result = $check->get_result();
		$row = $result->fetch_assoc();

		//dont update recuit  if recruit count is lower that onboard applicants
		if ($row['onboard']<=$recruit) {
      
			if($sql->execute()){

				$_SESSION['success'] = 'Job updated successfully';

				//prepare status stmt
				$stmt = $conn->prepare("UPDATE job SET job_status = ? WHERE id=$id");
				$stmt->bind_param("s", $status);

				//if status != starred
				if ($row['job_status']!='starred') {
					//if success and the recruit count is higher than the previous one (update status)
					if ($row['onboard']==$recruit) {
						$status = 'inactive';
					}else{
						$status = 'active';
					}

					$stmt->execute();
				}
			}
			else{
				$_SESSION['error'] = "Connection Timeout";
			}
		}else{
			$_SESSION['error'] = "Opps, the recruit count (".$recruit.") cannot be updated since there are already ".$row['onboard']." applicants onboarded in this job ";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../applicant.php');

?>