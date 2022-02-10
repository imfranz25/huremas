<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';



	if(isset($_POST['delete'])){

		// initialization 
		$id  = $_POST['id'];
    // check stmt if records found dont delete oke?
		$check = $conn->prepare("SELECT * FROM overtime_request WHERE overtime_code = ? ");
    $check->bind_param('s',$id);
    $check->execute();
    $result = $check->get_result();


		if ($result->num_rows==0) {

      //get values
      $check_row = $result->fetch_assoc();
			$pass  = $_POST['pass'];
			$employee_id = $user['employee_id'];

      //delete stmt
      $stmt = $conn->prepare("DELETE FROM overtime WHERE id = ? ");
      $stmt->bind_param("d", $id);

			//challenge
			if (password_verify($pass,get_password($employee_id,$conn))) {
        if ($stmt->execute()) {
          $_SESSION['success'] = 'Overtime record deleted successfully';
        }else{
          $_SESSION['error'] = 'Connection Timeout';
        }
			}else{
				$_SESSION['error'] = 'Incorrect Password, please try again';
			}

		}else{
			$_SESSION['error'] = 'Overtime category is currently in used';
		}


	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../overtime_category.php');
	
?>