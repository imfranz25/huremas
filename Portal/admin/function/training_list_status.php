<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['status_code'])){

    //get code
		$code = $_POST['status_code'];
		
		//update prepared stmt
		$stmt = $conn->prepare("UPDATE training_list SET training_status = ? WHERE training_code = ? ");
		$stmt->bind_param("ss", $status,$code);
		//check
		$check_size = $conn->prepare("SELECT *,(SELECT COUNT(*) FROM training_record WHERE training_record.training_code='$code' AND (status='Finished' OR status='Reviewed' OR status='On-going')) AS basecount FROM training_list WHERE training_list.training_code =? ");
    $check_size->bind_param('s',$code);
    $check_size->execute();
    //getch values
		$query = $check_size->get_result();
		$row = $query->fetch_assoc();

      if ($row['training_status']!='starred') {
      	$status = 'starred';
      	echo ($stmt->execute()) ? 1:2;
      }else{
      	$status = ($row['basecount']==$row['batch_size']) ? 'inactive': 'active' ;
      	echo ($stmt->execute()) ? 0:2;
      }
      
	} else {
    header('location: ../training_list.php');
  }
?>