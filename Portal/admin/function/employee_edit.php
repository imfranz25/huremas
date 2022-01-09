<?php
	include '../includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
        $firstname = addslashes($_POST['firstname']);
        $middlename = addslashes($_POST['middlename']);
		$lastname = addslashes($_POST['lastname']);
        $suffix = addslashes($_POST['suffix']);
		$address = addslashes($_POST['address']);
		$birthdate = $_POST['bday'];
		$mobile = $_POST['mobile'];
		$contact = $_POST['contact'];
        $email = addslashes($_POST['email']);
		$sex = $_POST['sex'];
		
		$filename = $_FILES['img']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['img']['tmp_name'], '../images/'.$filename);	
		}else{
			$filename = $_POST['dbimage'];
		}


		$position = $_POST['position'];
		$department = $_POST['department'];
		$schedule = $_POST['schedule'];
		$category = $_POST['category'];

		$date_hired = $_POST['date_hired'];
		$date_regular = $_POST['date_regular'];

		$sss = $_POST['sss'];
		$pagibig = $_POST['pagibig'];
		$phealth = $_POST['phealth'];
		$tin = $_POST['tin'];

		$basic_salary = $_POST['basic_salary'];
		$daily_wage = $_POST['daily_wage'];
		$sss_prem = $_POST['sss_prem'];
		$phealth_prem = $_POST['phealth_prem'];
		$pagibig_prem = $_POST['pagibig_prem'];

		$basic_salary = $_POST['basic_salary'];
		$daily_wage = $_POST['daily_wage'];
		
		$sql = "UPDATE employees SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', suffix = '$suffix', address = '$address', birthdate = '$birthdate',mobile_no='$mobile', contact_info = '$contact', email = '$email', sex = '$sex',photo='$filename' ,position_id = '$position', department_id='$department',schedule_id = '$schedule',category_id = '$category', date_hired = '$date_hired', date_regularization = '$date_regular',sss_id = '$sss',pagibig_id = '$pagibig',philhealth_id = '$phealth',tin_num = '$tin',basic_salary = '$basic_salary',daily_wage = '$daily_wage',sss_prem = '$sss_prem',philhealth_prem = '$phealth_prem',pagibig_prem = '$pagibig_prem',basic_salary = '$basic_salary',daily_wage = '$daily_wage' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: ../employee.php?page=employee_list');
?>