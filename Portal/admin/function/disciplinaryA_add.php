<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if (isset($_POST['add_action'])) {
		$admin = $user['firstname'].' '.$user['lastname'];
		$employee_id = $_POST['employee'];
		$reason = trim($_POST['reason']);
		$description = trim($_POST['description']);

		//creating reference_id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$reference_id = "CVSUDA".substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5);


		$sql = "INSERT INTO disciplinary_action (reference_id,employee_id,reason,internal_note,issued_by,state) VALUES ('$reference_id','$employee_id',$reason,'$description','$admin','Draft')";


		if($conn->query($sql)){

			// $get_id = "SELECT employee_id FROM cash_advance WHERE id = $id ";
			// $query = $conn->query($get_id);
			// $row = $query->fetch_assoc();
			// $emp_id = $row['employee_id'];
			$title = "You have new disciplinary record ";
			send_notif($conn, $employee_id, $title, 'disciplinary.php', 'employee');


			$_SESSION['success'] = 'Disciplinary action recorded successfully';
		}
		else{
			$$_SESSION['error'] = 'Connection Timeout';
		}
		
	}else{
		$_SESSION['error'] = 'Fill up add form first';
	}	

	header('location: ../disciplinary.php');


?>