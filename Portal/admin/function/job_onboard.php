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
		$mobile = trim($_POST['mobile']);
		$address = trim($_POST['address']);
		$email = trim($_POST['email']);
       	//employement details
       	$onboard_job = trim($_POST['onboard_job']); //job no
       	$applicant_no = trim($_POST['appno']);
		$filename = $_FILES['pic']['name'];
		$position = trim($_POST['posid']);
		$schedule = $_POST['schedule'];
		$department = $_POST['department'];
		$salary = $_POST['salary'];
		$wage = $_POST['wage'];
		$category = $_POST['category'];
		//goverment mandatory
		$sss = trim($_POST['sss']);
		$pagibig = trim($_POST['pagibig']);
		$philhealth = trim($_POST['philhealth']);
		$tin = trim($_POST['tin']);
		//contri
		$sss_prem = trim($_POST['sssprem']);
		$pagibig_prem = trim($_POST['pagibigprem']);
		$philhealth_prem = trim($_POST['philhealthprem']);
		//account
		$username = trim($_POST['username']);
		$ls = trim($_POST['ls']);
		$type = trim($_POST['type']);
		$pass = trim($_POST['pass']);

		//$password = trim($_POST['password']);
		//$cpassword = trim($_POST['cpassword']);
		//$pass_hash = password_hash($password,PASSWORD_DEFAULT);

		//PASSWORD REQUIREMENT
		//$uppercase = preg_match('@[A-Z]@', $password);
		//$lowercase = preg_match('@[a-z]@', $password);
		//$number    = preg_match('@[0-9]@', $password);
		//$special = preg_match('@[^\w]@', $password);
		//USERNAME
		/*
		$valid_username = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username);
		*/

		//creating default password
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$default = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		$default = substr(str_shuffle($default), 0, 15);

		$hashed_password = password_hash($default, PASSWORD_DEFAULT);


		

		//creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = 'CVSU'.substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 5).$ls;

		//get extension 
		$extension = pathinfo($_FILES["pic"]["name"])['extension'];
		//set filename (SET FILENAME FOR IMAGE -> EMP ID TO HAVE UNIQUE NAME)
		$new_filename = $employee_id.".".$extension;


		//insert employee
		$sql = "INSERT INTO employees (employee_id, firstname, middlename,lastname,suffix ,address, birthdate,mobile_no, contact_info, email, sex, photo, created_date, position_id, schedule_id, department_id, category_id, date_hired, date_regularization,sss_id,pagibig_id,philhealth_id,tin_num,basic_salary,daily_wage,sss_prem,philhealth_prem,pagibig_prem) VALUES ('$employee_id', '$firstname','$middlename', '$lastname','$suffix', '$address', '$birthdate', '$mobile', '$contact','$email', '$sex', 'CVSU$new_filename' ,NOW(),$position,$schedule,$department,$category,NOW(),NOW(),'$sss','$pagibig','$philhealth','$tin',$salary,$wage,$sss_prem,$philhealth_prem,$pagibig_prem)";

		//$check_user = "SELECT * FROM admin WHERE username ='$username' ";
		//$query = $conn->query($check_user); // check if  dupli
		//insert account
		//$admin = "INSERT INTO admin (employee_id,username,password,type) VALUES ('CVSU$employee_id','$username','$pass_hash','employee')";
		$admin = "INSERT INTO admin (`employee_id`, `username`, `password`, `default_password`, `type`) VALUES ('$employee_id','$username','$hashed_password','$default','$type')";	
		
		//update stage
		$update = "UPDATE applicant SET stage='On-Board' WHERE applicant_no = $applicant_no ";
		//update job status if recruit== to onboarded
		$check_recruit = "SELECT *, (SELECT COUNT(stage) FROM  applicant WHERE stage='On-Board' AND applicant.job_code=job.job_code ) AS onboarded FROM job WHERE job_code = '$onboard_job'";


		//VALIDATE  PASS -> USERNAME
		/*
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
		}
		*/

		$admin_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($admin_id,$conn))) {
	
			if ($conn->query($sql) & $conn->query($admin) && $conn->query($update)) {

				if(!empty($filename)){
					//move file
					move_uploaded_file($_FILES['pic']['tmp_name'], '../images/CVSU'.$new_filename);	
				}

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


		}else{
			 echo 2;
		}

		
	}


	
?>