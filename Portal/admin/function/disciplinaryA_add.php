<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if (isset($_POST['add_action'])) {
    //repare stmt insert action
    $sql = $conn->prepare("INSERT INTO disciplinary_action (reference_id,employee_id,reason,internal_note,issued_by,state) VALUES (?,?,?,?,?,'Draft')");
    $sql->bind_param('ssdss',$reference_id,$employee_id,$reason,$description,$admin);
    //get details
		$admin = $user['firstname'].' '.$user['lastname'];
		$employee_id = $_POST['employee'];
		$reason = trim($_POST['reason']);
		$description = trim($_POST['description']);

		//creating reference_id
		$reference_id = "CVSUDA".generate_id();

		if($sql->execute()){
      //notif emp
			$title = "You have new disciplinary record";
			send_notif($conn, $employee_id, $title, 'disciplinary.php', 'employee');
			$_SESSION['success'] = 'Disciplinary action recorded successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}
		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../disciplinary.php');


?>