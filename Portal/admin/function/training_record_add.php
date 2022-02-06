<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['code'])){
		$code = $_POST['code'];
		$id = $_POST['id'];

		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$reference_no = 'CVSUATT'.substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);

		$check_size ="SELECT *,(SELECT COUNT(*) FROM training_record WHERE training_record.training_code='$code' AND (status='Finished' OR status='Reviewed' OR status='On-going')) AS basecount FROM training_list WHERE training_list.training_code ='$code'";
		$query = $conn->query($check_size);
		$row = $query->fetch_assoc();

		$sql = "INSERT INTO training_record (reference_no,employee_id,training_code,status) VALUES ('$reference_no','$id','$code','On-going')";	

		if ($row['batch_size']>$row['basecount']) {
			$today = new Datetime('now');
			$end = new Datetime($row['schedule_to']);
			if ($end<=$today) {
				echo 3;
			}else{
				echo ($conn->query($sql))? 1:0;
			}
		}else{
			echo 2;
		}

	}
?>