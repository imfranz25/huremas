<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';
	require_once 'sendEmail.php';

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

		//$schedule = $_POST['schedule'];
		$department = $_POST['department'];
		$category = $_POST['category'];

		//goverment mandatory
		$sss = trim($_POST['sss']);
		$pagibig = trim($_POST['pagibig']);
		$philhealth = trim($_POST['philhealth']);
		$tin = trim($_POST['tin']);

		//account
		$username = trim($_POST['username']);
		$ls = trim($_POST['ls']);
		$type = trim($_POST['type']);
		$pass = trim($_POST['pass']);

		//creating default password
		$default = substr(str_shuffle(generate_id()), 0, 15);
		$hashed_password = password_hash($default, PASSWORD_DEFAULT);

		//creating employeeid
		$employee_id = 'CVSU'.generate_id().$ls;

		//get extension 
		$extension = pathinfo($_FILES["pic"]["name"])['extension'];
		//set filename (SET FILENAME FOR IMAGE -> EMP ID TO HAVE UNIQUE NAME)
		$new_filename = $employee_id.".".$extension;


		//insert employee
		$sql = $conn->prepare("INSERT INTO employees (employee_id, firstname, middlename,lastname,suffix ,address, birthdate,mobile_no, contact_info, email, sex, photo, created_date, position_id, department_id, category_id, date_hired,sss_id,pagibig_id,philhealth_id,tin_num) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW(),?,?,?,NOW(),?,?,?,?)");
    $sql->bind_param('ssssssssssssdddssss',$employee_id,$firstname,$middlename,$lastname,$suffix,$address,$birthdate,$mobile,$contact,$email,$sex,$new_filename,$position,$department,$category,$sss,$pagibig,$philhealth,$tin);

		//insert account details to admin
		$admin = $conn->prepare("INSERT INTO admin (`employee_id`, `username`, `password`, `default_password`, `type`) VALUES (?,?,?,?,?)");	
		$admin->bind_param('sssss',$employee_id,$username,$hashed_password,$default,$type);

		//update stage
		$update = $conn->prepare("UPDATE applicant SET stage='On-Board' WHERE applicant_no = ? ");
    $update->bind_param('d',$applicant_no);

		//update job status if recruit== to onboarded
		$check_recruit = $conn->prepare("SELECT *, (SELECT COUNT(stage) FROM  applicant WHERE stage='On-Board' AND applicant.job_code=job.job_code ) AS onboarded FROM job WHERE job_code = ? ");
    $check_recruit->bind_param('s',$onboard_job);

		$admin_id = $user['employee_id'];

		//challenge
		if (password_verify($pass,get_password($admin_id,$conn))) {
		    
		    
		    $day = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
			$inn = array("7:00", "7:30", "8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30");
			$outt = array("7:30", "8:00","8:30", "9:00","9:30", "10:00","10:30", "11:00","11:30", "12:00","12:30", "13:00","13:30", "14:00","14:30", "15:00","15:30", "16:00","16:30", "17:00","17:30", "18:00","18:30", "19:00","19:30", "20:00");
			for ($i=0; $i < count($day); $i++) {

				for ($j=0; $j <count($inn); $j++){

					$sql2 = "INSERT INTO schedules (employee_id, time_in, time_out,day,isCheck) VALUES('$employee_id','$inn[$j]','$outt[$j]','$day[$i]','0') ";
					$conn->query($sql2);
					
				}
			}

			$sql3 = "INSERT INTO `emp_max_hours`(`employee_id`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`) VALUES ('$employee_id','0','0','0','0','0','0') ";
			$conn->query($sql3);
	
	
	
			if ($sql->execute() & $admin->execute() && $update->execute()) {

				if(!empty($filename)){
					//move file
					move_uploaded_file($_FILES['pic']['tmp_name'], '../uploads/profile/'.$new_filename);	
				}

				//execeute test recruit after onboarding applicant
        $check_recruit->execute(); // check recruit
				$result_recruit = $check_recruit->get_result(); // check recruit
				$row_recruit = $result_recruit->fetch_assoc();

				if ($row_recruit['onboarded']==$row_recruit['job_recruit']) {

					$update_status = $conn->prepare("UPDATE job SET job_status='inactive' WHERE job_code = ? ");
          $update_status->bind_param('s',$onboard_job);
					$update_status->execute();
					
					
				}
				
		    // $subject="Account Created";
		    // $message = "Hello!,<br><br>You may now login at : http://huremas-cvsuic.online/Portal  <br>Username: ".$username."<br>Default Password: ".$default." <br><br>Please change your password immediately!";
      //   $res= sendEmail($email,$subject,$message);
        
				echo 1;
        
			}else{
				echo 0;
			}


		}else{
			 echo 2;
		}

		
	}else{
    header('location: ../applicant.php');
  }


	
?>