<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['code']) && isset($_POST['stage'])){

		$code = $_POST['code'];
		$stage = $_POST['stage'];
		$applicants = array('count'=> 0,'length'=> 0);
		$onboard = ($stage=='Hired')? 'On-Board': $stage;
		//SQL QUERY FROM 3 TABLES
		$sql = $conn->prepare("SELECT *, applicant.id AS aid, position.type AS ptype 
      FROM applicant
      RIGHT JOIN job ON applicant.job_code=job.job_code 
      RIGHT JOIN position ON job.job_position=position.id 
      RIGHT JOIN employment_category ec ON position.type=ec.id
      RIGHT JOIN department_category ON department_category.id=job.job_dept 
      WHERE job.job_code=? ; ");
    $sql->bind_param('s',$code);
    $sql->execute();
		$result = $sql->get_result();

		while ($row = $result->fetch_assoc()){
			//PUSH ALL DETAILS ALONG WITH JOB TITLE AND AMONG OTHER FOR DISPLAY
			array_push($applicants, $row);
			//GET LENGTH AND STORE IT IN DIFFERENT KEY VALUE FOR REFERENCE
			$applicants['length'] = $applicants['length']  + 1;
			//COUNT APPLICANTS IN THIS STAGE
			if ($row['stage']==$stage || $row['stage']==$onboard) {
				$applicants['count'] = $applicants['count']  + 1;
			}
		}
		echo json_encode($applicants);

	}else if (isset($_POST['aid'])) {

		$applicant_id = $_POST['aid'];
		$sql = $conn->prepare("SELECT * FROM applicant WHERE id = ? ");
    $sql->bind_param('d',$applicant_id);
    $sql->execute();
		$result = $sql->get_result();
		$row = $result->fetch_assoc();
		echo json_encode($row);

	}else {
    header('location: ../applicant.php');
  }

?>