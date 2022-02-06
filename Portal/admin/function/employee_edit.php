<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$empid1 = $_POST['eid'];
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
		$category = $_POST['category'];

		$date_hired = $_POST['date_hired'];

		$sss = $_POST['sss'];
		$pagibig = $_POST['pagibig'];
		$phealth = $_POST['phealth'];
		$tin = $_POST['tin'];


		$cbcounter = $_POST['deductions'];
		
		$sql = "UPDATE employees SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', suffix = '$suffix', address = '$address', birthdate = '$birthdate',mobile_no='$mobile', contact_info = '$contact', email = '$email', sex = '$sex',photo='$filename' ,position_id = '$position', department_id='$department',category_id = '$category', date_hired = '$date_hired',sss_id = '$sss',pagibig_id = '$pagibig',philhealth_id = '$phealth',tin_num = '$tin' WHERE id = '$empid'";
		if($conn->query($sql)){

			$sql0 = "DELETE FROM `deduction_employee` WHERE employee_id='$empid1'";
			$conn->query($sql0);

			for ($i=0; $i < $cbcounter  ; $i++) { 
				$cbname = "cb".$i;
				if((isset($_POST[$cbname])) && ($category=='1')){
					$did = $_POST[$cbname];
					$sql2 = "INSERT INTO deduction_employee (employee_id, deduction_id) VALUES('$empid1','$did') ";
					$conn->query($sql2);
				}	
			}




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