<?php
	include '../includes/session.php';

	if(isset($_POST['refcode'])){
		$refcode = $_POST['refcode'];
		$sql = "UPDATE training_record SET status='Rejected' WHERE reference_no ='$refcode' ";	
		echo ($conn->query($sql))? 1:0;
	}else if (isset($_POST['status'])) {
		$status = $_POST['status'];
		$review_code = $_POST['review_code'];
		$code = $_POST['add_training_code'];

		$sql = "UPDATE training_record SET status='$status' WHERE reference_no ='$review_code' ";	

		if ($status != 'Rejected') {

			$check_size ="SELECT *,(SELECT COUNT(*) FROM training_record WHERE training_record.training_code='$code' AND (status='Finished' OR status='Reviewed' OR status='On-going')) AS basecount FROM training_list WHERE training_list.training_code ='$code'";
			$query = $conn->query($check_size);
			$row = $query->fetch_assoc();

			if ($row['batch_size']>$row['basecount']) {
				echo ($conn->query($sql))? 1:0;
			}else{
				echo 2;
			}

		}else{
			echo ($conn->query($sql))? 1:0;
		}
	
	}
?>