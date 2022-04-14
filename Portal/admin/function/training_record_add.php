<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['code'])){

    // get details
		$code = $_POST['code'];
		$id = $_POST['id'];
    $reference_no = 'CVSUATT'.generate_id();

    // check the size first
		$check_size = $conn->prepare("SELECT *,(SELECT COUNT(*) FROM training_record WHERE training_record.training_code='$code' AND (status='Finished' OR status='Reviewed' OR status='On-going')) AS basecount FROM training_list WHERE training_list.training_code =? ");
    $check_size->bind_param('s',$code);
    $check_size->execute();
		$query = $check_size->get_result();
		$row = $query->fetch_assoc();

    // prepared stmt
		$sql = $conn->prepare("INSERT INTO training_record (reference_no,employee_id,training_code,status) VALUES (?,?,?,'On-going')");	
    $sql->bind_param('sss',$reference_no,$id,$code);

		if ($row['batch_size']>$row['basecount']) {
			$today = new Datetime('now');
			$end = new Datetime($row['schedule_to']);
			if ($end<=$today) {
				echo 3;
			}else{
				echo ($sql->execute())? 1:0;
			}
		}else{
			echo 2;
		}

	} else {
    header('location: ../training_vendor.php');
  }
?>