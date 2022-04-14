<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['delete'])){

    // get details
		$code = $_POST['code'];
		$pass = $_POST['pass'];
		$employee_id = $user['employee_id'];
		$training = $conn->prepare("DELETE FROM training_list WHERE training_code = ? ");
		$record = $conn->prepare("DELETE FROM training_record WHERE training_code = ? ");
    // bind params
    $training->bind_param('s',$code);
    $record->bind_param('s',$code);

		//challenge
		if (password_verify($pass,get_password($employee_id,$conn))) {
			if($training->execute() && $record->execute()){
				$_SESSION['success'] = 'Training record deleted successfully';
			}
			else{
				$_SESSION['error'] = 'Connection Timeout';
			}
		}else{
			$_SESSION['error'] = 'Incorrect Password, please try again';
		}
	}
	header('location: ../training_list.php');
?>