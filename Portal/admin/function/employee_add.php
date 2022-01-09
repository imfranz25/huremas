<?php
	include '../includes/session.php';

	if(isset($_POST['add'])){
		$firstname = addslashes($_POST['firstname']);
        $middlename = addslashes($_POST['middlename']);
		$lastname = addslashes($_POST['lastname']);
        $suffix = addslashes($_POST['suffix']);
		$address = addslashes($_POST['address']);
		$birthdate = $_POST['birthdate'];
		$mobile = $_POST['mobile'];
		$contact = $_POST['contact'];
        $email = addslashes($_POST['email']);
		$sex = $_POST['sex'];
		
		$filename = $_FILES['img']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['img']['tmp_name'], '../images/'.$filename);	
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
		//


		$sql = "INSERT INTO employees (employee_id, firstname, middlename, lastname, suffix, address, birthdate, mobile_no, contact_info, email, sex, photo, position_id, department_id, schedule_id, category_id, date_hired, date_regularization, sss_id, pagibig_id, philhealth_id, tin_num, basic_salary, daily_wage, sss_prem, philhealth_prem, pagibig_prem,created_date) VALUES ('CVSU$employee_id', '$firstname','$middlename', '$lastname','$suffix', '$address', '$birthdate','$mobile', '$contact','$email', '$sex', '$filename','$position','$department','$schedule','$category','$date_hired','$dateregular','$sss','$pagibig','$phealth','$tin','$basic_salary','$daily_wage','$sss_prem','$philhealth_prem','$pagibig_prem',NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../employee.php?page=employee_list');
?>