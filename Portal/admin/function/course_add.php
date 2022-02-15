<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

		$code = trim($_POST['code']);
		$title = trim($_POST['title']);
		$details = trim($_POST['details']);

		$sql = $conn->prepare("INSERT INTO training_course (course_code,course_title,course_details) VALUES (?,?,?)");	
    $sql->bind_param('sss',$code,$title,$details);

		if($sql->execute()){
			$_SESSION['success'] = 'Course added successfully';
		}
		else{
			$_SESSION['error'] = "Course Code already exist";
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../training_course.php');
?>