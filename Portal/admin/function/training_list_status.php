<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['status_code'])){
		$code = $_POST['status_code'];
		
		//update prepared stmt
		$stmt = $conn->prepare("UPDATE training_list SET training_status = ? WHERE training_code = '$code' ");
		$stmt->bind_param("s", $status);
		//check
		$check_size ="SELECT *,(SELECT COUNT(*) FROM training_record WHERE training_record.training_code='$code' AND (status='Finished' OR status='Reviewed' OR status='On-going')) AS basecount FROM training_list WHERE training_list.training_code ='$code'";
		$query = $conn->query($check_size);
		$row = $query->fetch_assoc();

        if ($row['training_status']!='starred') {
        	$status = 'starred';
        	echo ($stmt->execute()) ? 1:2;
        }else{
        	$status = ($row['basecount']==$row['batch_size']) ? 'inactive': 'active' ;
        	echo ($stmt->execute()) ? 0:2;
        }


	}
?>