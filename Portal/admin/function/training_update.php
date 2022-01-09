<?php 

	require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");

	$update_record = $conn->prepare("UPDATE training_record SET status='Finished' WHERE training_code = ? ");
	$update_record->bind_param('s',$code);

	$select = "SELECT * FROM training_record LEFT JOIN training_list ON training_list.training_code=training_record.training_code";
	$query = $conn->query($select);

	while ($row=$query->fetch_assoc()) {
		if ($row['status']=='On-going') {
			$today = strtotime(date('Y-m-d'));
			$end = strtotime($row['schedule_to']);
			if ($today>=$end) {
				$code = $row['training_code'];
				$update_record->execute();
			}
		}
	}

		

?>

