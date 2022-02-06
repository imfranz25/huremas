<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	$stmt = $conn->prepare("DELETE FROM overtime WHERE id = ? ");
	$stmt->bind_param("d", $delete);

	function delete($id){
		global $stmt,$delete;
		$delete = $id;
		$stmt->execute() ? $_SESSION['success'] = 'Overtime record deleted successfully' : $_SESSION['error'] = 'Connection Timeout';
	}

	if(isset($_POST['delete'])){
		// initialization shitty
		$id  = $_POST['id'];


		$check = "SELECT * FROM overtime_request WHERE overtime_code = '$id' ";
		$query = $conn->query($check);
		$count = mysqli_num_rows($query);

		if ($count==0) {

			$pass  = $_POST['pass'];
			$employee_id = $user['employee_id'];

			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
				// if (count($id) > 1) {
				// 	array_map('delete', $id);
				// }else{
					delete($id[0]);
				//}
			}else{
				 $_SESSION['error'] = 'Incorrect Password, please try again';
			}
		}else{
			$_SESSION['error'] = 'Overtime category is currently in used';
		}


	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../overtime_category.php');
	
?>