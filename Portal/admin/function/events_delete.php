<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';


	$stmt = $conn->prepare("DELETE FROM events WHERE reference_id = ? ");
	$stmt->bind_param("s", $delete);

	function delete($id){
		global $stmt,$delete;
		$delete = $id;
		$stmt->execute() ? $_SESSION['success'] = 'Event(s) deleted successfully' : $_SESSION['error'] = 'Connection Timeout';
	}

	if(isset($_POST['delete'])){
		// initialization shitty
		$id  = explode(',', $_POST['id']);
		$pass  = $_POST['pass'];
		$employee_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
			if (count($id) > 1) {
				array_map('delete', $id);
			}else{
				delete($id[0]);
			}
		}else{
			 $_SESSION['error'] = 'Incorrect Password, please try again';
		}

	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../events.php');
	
?>