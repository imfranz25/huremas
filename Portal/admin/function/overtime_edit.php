<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
	  // edit prepare stmt
		$sql = $conn->prepare("UPDATE overtime SET  status = ?, overtime_name = ?, overtime_rate = ? WHERE id = ? ");
    $sql->bind_param('ssdd',$status,$name,$rate,$id);
    //get values
    $id = $_POST['OT_id'];
    $status = isset($_POST['edit_status']) ? $_POST['edit_status'] : "inactive";
    $name = $_POST['edit_name'];
    $rate = $_POST['edit_rate'];
		
		if($sql->execute()){
			$_SESSION['success'] = 'Overtime updated successfully';
		}
		else{
			$_SESSION['error'] = "Connection Timeout";
		}
	}
	else{
		$_SESSION['error'] = 'Select overtime record to edit first';
	}

	header('location: ../overtime_category.php');
?>