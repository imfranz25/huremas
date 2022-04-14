<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    // get details
		$title = trim($_POST['title']);
		$objective = trim($_POST['objective']);
		$course = $_POST['course'];
		$size = trim($_POST['size']);
		$from = $_POST['from'];
		$to = $_POST['to'];
		$mode = $_POST['mode'];
		$vendor = $_POST['vendor'];
		$trainer = trim($_POST['trainer']);
		$exp = trim($_POST['exp']);
		$details = trim($_POST['details']);
		$duration =abs(strtotime($to)-strtotime($from))/(60*60); //duration

    //generate training code
    $code = 'CVSUTRA'.generate_id();

		$sql = $conn->prepare("INSERT INTO training_list (training_code,training_title,training_objective,training_course,batch_size,schedule_from,schedule_to,training_mode,training_details,training_duration,training_vendor,training_trainer,training_experience,training_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,'active')");
    $sql->bind_param('sssddsssssdss',$code,$title,$objective,$course,$size,$from,$to,$mode,$details,$duration,$vendor,$trainer,$exp); 

		if($sql->execute()){
			$_SESSION['success'] = 'Training posted successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: ../training_list.php');
?>