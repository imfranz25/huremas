<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //insert job details prepared statement
		$sql = $conn->prepare("INSERT INTO job (job_code, job_title, job_position, job_recruit, job_dept, job_term, job_type, job_exp, job_grade, job_desc,job_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,'active')");
    $sql->bind_param('ssddssssds',$code,$title,$position,$recruit,$department,$term,$type,$exp,$grade,$desc);

    //get details
    $title = trim($_POST['title']);
    $position = trim($_POST['position']);
    $recruit = trim($_POST['recruit']);
    $department = trim($_POST['department']);
    $term = trim($_POST['term']);
    $type = trim($_POST['type']);
    $exp = trim($_POST['exp']);
    $grade = trim($_POST['grade']);
    $desc = trim($_POST['desc']);

    //creating job_code
    $code = "CVSUJOB".generate_id();

		if($sql->execute()){
			$_SESSION['success'] = 'Job added successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../applicant.php');
  
?>