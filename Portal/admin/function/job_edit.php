<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){
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


		$sql = "UPDATE job SET job_title='$title', job_position=$position, job_recruit=$recruit, job_dept='$department', job_term='$term', job_type='$type', job_exp='$exp', job_grade=$grade, job_desc='$desc' WHERE id=$id ";

		$check = "SELECT *, job.id AS jid, (SELECT COUNT(stage) FROM  applicant WHERE job_code = job.job_code AND stage='On-Board') AS onboard FROM job WHERE id=$id  ";
		$query = $conn->query($check);
		$row = $query->fetch_assoc();

		//dont update recuit  if recruit count is lower that onboard applicants
		if ($row['onboard']<=$recruit) {
			if($conn->query($sql)){

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