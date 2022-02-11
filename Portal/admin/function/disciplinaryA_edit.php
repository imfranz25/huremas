<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

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

		$sql = $conn->prepare("UPDATE disciplinary_action SET employee_id=?, reason=?, internal_note=? $action_query WHERE reference_id =? ");
    $sql->bind_param('sdss',$employee_id,$reason,$description,$reference);

		if($sql->execute()){
      //send notif to emloyee
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