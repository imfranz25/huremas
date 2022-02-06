<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	//delete
	$stmt = $conn->prepare("DELETE FROM deduction_vendor WHERE id = ? ;");
	$stmt->bind_param("d", $delete);
	//check if vendor record is currently use in deduction table or tax table
	$check_active = $conn->prepare("SELECT *,
		(SELECT COUNT(deduction_vendor) FROM  deduction WHERE deduction_vendor = ?) +
		(SELECT COUNT(tax_vendor) FROM  tax WHERE tax_vendor = ?) AS count 
		FROM deduction_vendor WHERE id = ? ");
	$check_active->bind_param("ddd",$delete,$delete,$delete);
	$notes=""; //Message for user

	function delete($id){
		global $stmt,$check_active,$delete,$notes;
		$delete = $id;

		// CHECK IF VENDOR IS CURRENTLY PRESENT IN DEDUCTION/TAX TABLES
		// IF ACTIVE (DONT DELETE, THEN NOTIFY USER THAT ITS CURRENTLY USED AS VENDOR)
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

	header('location: ../deduction.php');
	
?>