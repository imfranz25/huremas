<?php 

	include '../includes/session.php';

	if (isset($_POST['edit_action'])) {
		//basic info
		$reference = $_POST['reference'];
		$employee_id = $_POST['employee'];
		$reason = trim($_POST['reason']);
		$description = trim($_POST['description']);
		//action
		$action = isset($_POST['action']) ? trim($_POST['action']) : ''; //null
		$action_details = isset($_POST['action_details']) ? trim($_POST['action_details']) : ''; //null

		if ($action!='' || $action_details!='' ) {
			$action_query = ",action='$action',action_details='$action_details', state='Reviewed'";
		}else{
			$action_query="";
		}

		$sql = "UPDATE disciplinary_action SET employee_id='$employee_id', reason=$reason, internal_note='$description' $action_query WHERE reference_id ='$reference' ";

		if($conn->query($sql)){

			// $get_id = "SELECT employee_id FROM cash_advance WHERE id = $id ";
			// $query = $conn->query($get_id);
			// $row = $query->fetch_assoc();
			// $emp_id = $row['employee_id'];
			$title = "Disciplinary record update";
			send_notif($conn, $employee_id, $title, 'disciplinary.php', 'employee');


			$_SESSION['success'] = 'Disciplinary action updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../disciplinary.php');


?>