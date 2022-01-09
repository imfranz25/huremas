<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){

		$code = trim($_POST['code']);
		$title = trim($_POST['title']);
		$details = trim($_POST['details']);

		$sql = "INSERT INTO training_course (course_code,course_title,course_details) VALUES ('$code','$title','$details')";	

		if($conn->query($sql)){
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