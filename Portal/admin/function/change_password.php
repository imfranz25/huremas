<?php 
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['confirmpass'])){	

		//INITIALIZATION
		$current = $_POST['currentpass'];
		$new = $_POST['newpass'];
		$confirm = $_POST['confirmpass'];

		//UPDATE PASSWORD REQUIREMENT
		$uppercase = preg_match('@[A-Z]@', $new);
		$lowercase = preg_match('@[a-z]@', $new);
		$number    = preg_match('@[0-9]@', $new);
		$special = preg_match('@[^\w]@', $new);

		//SQL PREPARATION STATEMENT
		$stmt = $conn->prepare("UPDATE admin SET password = ? WHERE employee_id = ? ");
		$stmt->bind_param("ss",$confirm,$id);
		
		//VALIDATE NEW PASS
		if(strlen($new) < 8 ){
			$output["error_new"] = "Password Must be a minimum of 8 characters";
		}
		else if(!$uppercase || !$lowercase || !$number || !$special){
			$output["error_new"] = "Must have (1) number, lowercase, uppercase, & special characters";
		}
		//VALIDATE CONFIRM PASS
		else if($new != $confirm){
			$output["error_confirm"] = "Password and Confirm Password does not match";
		}
		//VALIDATE CURRENT PASS
		else if(!(password_verify($current, $user['password']))){
			$output["error_current"] = "Current Password does not match";
		}
		// UPDATE PASSWORD
		else{
			//INITIALIZE PARAMETERS FOR STATEMENT
			$confirm = password_hash($confirm, PASSWORD_DEFAULT);
			$id = $user['employee_id'];
			$status = $stmt->execute(); //EXECUTE STATEMENT
			if ($status === false) {
				$output["error"] = "Account Update Failed";
			}
			else{
				$output["success"] = "Account Update Successful";
			}
		}
		echo json_encode($output); // SEND OUTPUT
	}//POST METHOD CONFIRM **END**
  else{
    header('location:../profile.php');
  }

?>