<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
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
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$code = "CVSUJOB".substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);


		$sql = "INSERT INTO job (job_code, job_title, job_position, job_recruit, job_dept, job_term, job_type, job_exp, job_grade, job_desc,job_status) VALUES ('$code', '$title', $position, $recruit,'$department','$term','$type','$exp',$grade,'$desc','active')";


		if($conn->query($sql)){
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