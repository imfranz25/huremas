<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if (isset($_POST['edit'])) {
		$id = trim($_POST['id']);
		$code = trim($_POST['code']);
		$title = trim($_POST['title']);
		$details = trim($_POST['details']);

		$sql = "UPDATE training_course SET course_code='$code', course_title='$title', course_details='$details' WHERE id =$id ";	

		if($conn->query($sql)){
			$_SESSION['success'] = 'Course updated successfully';
		}
		else{
			$_SESSION['error'] = "Course Code already exist";
		}

		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../training_course.php');


?>

