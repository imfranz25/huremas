
<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	if(isset($_POST['id'])){

		$id = trim($_POST['id']);
		$type = $_POST['type'];
		$account = $_POST['account'];
		$amount = trim($_POST['amount']);
		$reason = trim($_POST['reason']);
	
		$sql = "UPDATE cash_advance SET ca_type ='$type',ca_account='$account',amount=$amount,ca_reason='$reason' WHERE id=$id ";

		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Cash Advance Request updated succesfully';
		}else{
			$_SESSION['error'] = $conn->error;
		}

		
	}else{
		$_SESSION['error'] = 'Select item to edit first';
	}

	header('location: ../cash_advance.php');
?>