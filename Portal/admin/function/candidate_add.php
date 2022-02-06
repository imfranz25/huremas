<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';
	require_once 'sendEmail.php';

	if (isset($_POST['code'])) {

		//get values
		$code =  trim($_POST['code']);
		$fname = trim($_POST['fname']);
		$mname = trim($_POST['mname']);
		$lname = trim($_POST['lname']);
		$email = trim($_POST['email']);
		$contact = trim($_POST['contact']);
		$file_size = $_FILES["resume"]["size"];

		//create applicant number for file name
		$numbers = '';
		for($i = 0; $i < 10; $i++){$numbers .= $i;}
		$applicant_no = (date("Y")).substr(str_shuffle($numbers), 0, 9);

		//get extension 
		$extension = pathinfo($_FILES["resume"]["name"])['extension'];
		//set filename
		$new_filename = $applicant_no.".".$extension;
		
		$sql = "INSERT INTO applicant (applicant_no,job_code,first_name,middle_name,last_name,email,contact,attachment,stage) VALUES ('$applicant_no', '$code', '$fname', '$mname', '$lname', '$email', '$contact', '$new_filename','New Candidates')";

		//valid extension array (document Type)
		$valid_extension = array('pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx');

		if (!in_array($extension, $valid_extension)) {
		    echo 3;
		}else if ($file_size > 5242880) { //5MB Maximum file size
			echo 2;
		}else{
			//move file
			move_uploaded_file($_FILES["resume"]["tmp_name"], '../uploads/applicant/'.$applicant_no.".".$extension);
			echo ($conn->query($sql)) ? 1 : 0;
			

		    $subject="Application Received";
		    $message = "Hello!,<br><br>Your job application has been received, we will notify you if your application has been evaluated. <br>For more  email us at hrdoimus@cvsu.edu.ph";
		    
		    $res= sendEmail($email,$subject,$message);

			
		}
	}




?>