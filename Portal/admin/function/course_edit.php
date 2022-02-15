<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if (isset($_POST['edit'])) {
		
    // prepared stmt
		$sql = $conn->prepare("UPDATE training_course SET course_code=?, course_title=?, course_details=? WHERE id = ? ");	
    $sql->bind_param('sssd',$code,$title,$details,$id);

    //get values
    $id = trim($_POST['id']);
    $code = trim($_POST['code']);
    $title = trim($_POST['title']);
    $details = trim($_POST['details']);

		if($sql->execute()){
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

