<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['refcode'])){

    //get code
		$refcode = $_POST['refcode'];
		$sql = $conn->prepare("UPDATE training_record SET status='Rejected' WHERE reference_no =? ");	
    $sql->bind_param('s',$refcode);
		echo ($sql->execute())? 1:0;

	}else if (isset($_POST['status'])) {

    // get details
		$status = $_POST['status'];
		$review_code = $_POST['review_code'];
		$code = $_POST['add_training_code'];

    // prepared stmt
		$sql = $conn->prepare("UPDATE training_record SET status=? WHERE reference_no =? ");
    $sql->bind_param('ss',$status,$review_code);

		if ($status != 'Rejected') {

      // check size
			$check_size = $conn->prepare("SELECT *,(SELECT COUNT(*) FROM training_record WHERE training_record.training_code=? AND (status='Finished' OR status='Reviewed' OR status='On-going')) AS basecount FROM training_list WHERE training_list.training_code =? ");
      $check_size->bind_param('ss',$code,$code);
      $check_size->execute();
			$query = $check_size->get_result();
			$row = $query->fetch_assoc();

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
      
		}else{
			echo ($sql->execute())? 1:0;
		}
	
	} else {
    header('location: ../training_vendor.php');
  }
?>