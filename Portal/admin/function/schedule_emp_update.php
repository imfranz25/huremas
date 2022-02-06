<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['datas'])){
		$id = $_POST['datas'];
		$eid = $_POST['id'];

		$sql = "UPDATE schedules SET isCheck='0' WHERE employee_id='$eid'";
		$conn->query($sql);

		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule updated successfully';
		}

		for ($i=0; $i < count($id); $i++) { 
			$sql1 = "UPDATE schedules SET isCheck='1' WHERE id = '$id[$i]' AND employee_id='$eid'";
			$conn->query($sql1);
		}

		
	}
?>