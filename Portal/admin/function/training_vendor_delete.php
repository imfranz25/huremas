<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	//delete
	$stmt = $conn->prepare("DELETE FROM training_vendor WHERE id = ? ;");
	$stmt->bind_param("d", $delete);

	function delete($id){
		global $stmt,$delete,$notes;
		$delete = $id;
		$stmt->execute() ? $_SESSION['success'] = 'Vendor record deleted successfully' : $_SESSION['error'] = "Connection Timeout";

	}

	if(isset($_POST['delete'])){
		// initialization shitty
		$id  = $_POST['id'];
		$employee_id = $user['employee_id'];
		$check = "SELECT * FROM training_list WHERE training_vendor = $id ";
		$query = $conn->query($check);
		$count = mysqli_num_rows($query);
		echo $count;
		if ($count==0) {
			//challenge
			$pass  = $_POST['pass'];
			if (password_verify($pass,get_password($employee_id,$conn))) {
				delete($id);
			}else{
				 $_SESSION['error'] = 'Incorrect Password, please try again';
			}
		}else{
			$_SESSION['error'] = 'Training vendor currently in used';
		}



	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../training_vendor.php');
	
?>