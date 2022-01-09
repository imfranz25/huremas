
<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['save'])){
		$reference=trim($_POST['ref_review']);
		$rate = trim($_POST['rate']);
		$comment = trim($_POST['comment']);
	
		$sql = "UPDATE training_record SET review=$rate, comment='$comment', status='Reviewed' WHERE reference_no='$reference' ";

		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Review sent succesfully';
		}else{
			$_SESSION['error'] = $conn->error;
		}

		
	}else{
		$_SESSION['error'] = 'Select item to edit first';
	}

	header('location: ../training.php');
?>