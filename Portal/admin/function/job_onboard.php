<?php
	include '../includes/session.php';

	if (isset($_POST['fname'])) {
		//personal
		$firstname = trim($_POST['fname']);
        $middlename = trim($_POST['mname']);
		$lastname = trim($_POST['lname']);
        $suffix = trim($_POST['suffix']);
		$sex = $_POST['sex'];
		$birthdate = $_POST['bday'];
		$contact = trim($_POST['contact']);
		$address = trim($_POST['address']);
       	//employement details
       	$onboard_job = trim($_POST['onboard_job']);
       	$applicant_no = trim($_POST['appno']);
		$filename = $_FILES['pic']['name'];
		$position = trim($_POST['posid']);
		$schedule = $_POST['schedule'];
		$department = $_POST['department'];
		//account
		$email = trim($_POST['email']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$cpassword = trim($_POST['cpassword']);
		$pass_hash = password_hash($password,PASSWORD_DEFAULT);

		//PASSWORD REQUIREMENT
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$special = preg_match('@[^\w]@', $password);
		//USERNAME
		$valid_username = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username);

		//creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

		//get extension 
		$extension = pathinfo($_FILES["pic"]["name"])['extension'];
		//set filename (SET FILENAME FOR IMAGE -> EMP ID TO HAVE UNIQUE NAME)
		$new_filename = $employee_id.".".$extension;


		//insert employee
		$sql = "INSERT INTO employees (employee_id, firstname, middlename,lastname,suffix ,address, birthdate, contact_info, email, sex, photo, created_date, position_id, schedule_id,department_id) VALUES ('CVSU$employee_id', '$firstname','$middlename', '$lastname','$suffix', '$address', '$birthdate', '$contact','$email', '$sex', 'CVSU$new_filename' ,NOW(),'$position','$schedule','$department')";
		$check_user = "SELECT * FROM admin WHERE username ='$username' ";
		$query = $conn->query($check_user); // check if  dupli
		//insert account
		$admin = "INSERT INTO admin (employee_id,username,password,type) VALUES ('CVSU$employee_id','$username','$pass_hash','employee')";
		//update stage
		$update = "UPDATE applicant SET stage='On-Board' WHERE applicant_no = $applicant_no ";
		//update job status if recruit== to onboarded
		$check_recruit = "SELECT *, (SELECT COUNT(stage) FROM  applicant WHERE stage='On-Board' AND applicant.job_code=job.job_code ) AS onboarded FROM job WHERE job_code = '$onboard_job'";
		//VALIDATE  PASS -> USERNAME
		if(strlen($username) < 4 ){
			echo 6; // 6-> Username must be 4 characters long
		}else if($valid_username){
			echo 5; // 5-> Username must not contain spcial characters
		}else if($query->num_rows > 0){
			echo 7; // 7-> Username already taken
		}else if(strlen($password) < 8 ){
			echo 4; // 4-> Password  must be 8 characters long
		}else if(!$uppercase || !$lowercase || !$number || !$special){
			echo 3; // 3-> Password (special,num,lower,upper) must contain
		}else if($password != $cpassword){
			echo 2; // 2-> Pass & cpass not match
		}else{
			if(!empty($filename)){
				//move file
				move_uploaded_file($_FILES['pic']['tmp_name'], '../images/CVSU'.$new_filename);	
			}

			if ($conn->query($sql) && $conn->query($admin) && $conn->query($update)) {
				//execeute test recruit after onboarding applicant
				$query_recruit = $conn->query($check_recruit); // check recruit
				$result_recruit = $query_recruit->fetch_assoc();

				if ($result_recruit['onboarded']==$result_recruit['job_recruit']) {
					$update_status = "UPDATE job SET job_status='inactive' WHERE job_code = '$onboard_job' ";
					$conn->query($update_status);
				}
				echo 1;
			}else{
				echo 0;
			}

			
		}
	
		
	}


	
?>