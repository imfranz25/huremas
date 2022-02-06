<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){
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
		}

		$position = $_POST['position'];
		$department = $_POST['department'];
		$category = $_POST['category'];

		$date_hired = $_POST['date_hired'];

		$sss = $_POST['sss'];
		$pagibig = $_POST['pagibig'];
		$phealth = $_POST['phealth'];
		$tin = $_POST['tin'];



		$cbcounter = $_POST['deductions'];


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


		$sql = "INSERT INTO employees (employee_id, firstname, middlename, lastname, suffix, address, birthdate, mobile_no, contact_info, email, sex, photo, position_id, department_id, category_id, date_hired, sss_id, pagibig_id, philhealth_id, tin_num,created_date) VALUES ('CVSU$employee_id', '$firstname','$middlename', '$lastname','$suffix', '$address', '$birthdate','$mobile', '$contact','$email', '$sex', '$filename','$position','$department','$category','$date_hired','$sss','$pagibig','$phealth','$tin',NOW())";
		if($conn->query($sql)){


			for ($i=0; $i < $cbcounter  ; $i++) { 
				$cbname = "cb".$i;
				if((isset($_POST[$cbname])) && ($category=='1')){
					$did = $_POST[$cbname];
					$sql2 = "INSERT INTO deduction_employee (employee_id, deduction_id) VALUES('CVSU$employee_id','$did') ";
					$conn->query($sql2);
				}	
			}

			$day = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
			$inn = array("7:00", "7:30", "8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30");
			$outt = array("7:30", "8:00","8:30", "9:00","9:30", "10:00","10:30", "11:00","11:30", "12:00","12:30", "13:00","13:30", "14:00","14:30", "15:00","15:30", "16:00","16:30", "17:00","17:30", "18:00","18:30", "19:00","19:30", "20:00");
			for ($i=0; $i < count($day); $i++) {

				for ($j=0; $j <count($inn); $j++){

					$sql2 = "INSERT INTO schedules (employee_id, time_in, time_out,day,isCheck) VALUES('CVSU$employee_id','$inn[$j]','$outt[$j]','$day[$i]','0') ";
					$conn->query($sql2);
					
				}
			}

			$sql3 = "INSERT INTO `emp_max_hours`(`employee_id`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`) VALUES ('CVSU$employee_id','0','0','0','0','0','0') ";
			$conn->query($sql3);

			
		
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