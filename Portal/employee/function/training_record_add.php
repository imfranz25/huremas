<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");

	if(isset($_POST['code'])){
		$code = trim($_POST['code']);
		$note = trim($_POST['note']);
		$emp_id = $user['employee_id'];

		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$reference_no = 'CVSUATT'.substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);


		$sql = "INSERT INTO training_record (reference_no,employee_id,training_code,status,internal_note) VALUES ('$reference_no','$emp_id','$code','Pending','$note')";	


		if ($conn->query($sql)) {
			$full = $user['firstname'].' '.$user['lastname'];
			$title = $full." sent a training request";
			send_notif($conn, $emp_id, $title, 'training_list.php', 'admin');
			echo 1;
		}else{
			echo 0;
		}

	}	
	

?>