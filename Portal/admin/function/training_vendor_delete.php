<?php
	include '../includes/session.php';

	//delete
	$stmt = $conn->prepare("DELETE FROM training_vendor WHERE id = ? ;");
	$stmt->bind_param("d", $delete);
	$check_active = $conn->prepare("SELECT COUNT(training_vendor) AS count FROM  training_list WHERE training_vendor = ?");
	$check_active->bind_param("d",$delete);
	$notes=""; //Message for user

	function delete($id){
		global $stmt,$check_active,$delete,$notes;
		$delete = $id;

		$check_active->execute();
		$result = $check_active->get_result(); 
		$count = $result->fetch_assoc(); 
		if ($count['count'] < 1) {
			$stmt->execute() ? $_SESSION['success'] = 'Vendor record(s) deleted successfully' : $_SESSION['error'] = "Connection Timeout";
		}
		else{
			$notes .= "&#8594;<mark> ".$count['vendor_name']."</mark><br>";
		}
		
	}

	if(isset($_POST['delete'])){
		// initialization shitty
		$id  = explode(',', $_POST['id']);

		if (count($id) > 1) {
			array_map('delete', $id);
		}
		else{
			delete($id[0]);
		}
		//notify user for
		if ($notes) {
			$_SESSION['warning'] = 'Unable to delete the following vendor record(s) :<br>'.$notes;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../training_vendor.php');
	
?>