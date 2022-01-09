<?php
	include '../includes/session.php';


	$stmt = $conn->prepare("DELETE FROM training_course WHERE id = ? ");
	$stmt->bind_param("d", $delete);

	function delete($id){
		global $stmt,$delete;
		$delete = $id;
		$stmt->execute() ? $_SESSION['success'] = 'Course(s) deleted successfully' : $_SESSION['error'] = 'Connection Timeout';
	}

	if(isset($_POST['delete'])){
		// initialization shitty
		$id  = explode(',', $_POST['id']);

		if (count($id) > 1) {
			array_map('delete', $id);
		}else{
			delete($id[0]);
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../training_course.php');
	
?>