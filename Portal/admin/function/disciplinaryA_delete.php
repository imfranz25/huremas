<?php 
	include '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM disciplinary_action WHERE reference_id = '$id' ";

		
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Disciplinary Action deleted successfully';
		}else{
			$_SESSION['error'] = $conn->error;
		}

	}
	header('location: ../disciplinary.php');
?>