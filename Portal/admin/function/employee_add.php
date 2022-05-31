<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //get values
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
    //employement details
    $position = $_POST['position'];
    $department = $_POST['department'];
    $category = $_POST['category'];
    $date_hired = $_POST['date_hired'];
    $sss = $_POST['sss'];
    $pagibig = $_POST['pagibig'];
    $phealth = $_POST['phealth'];
    $tin = $_POST['tin'];
		$filename = $_FILES['img']['name'];
    $new_filename = '';

    //for contracts (that has deduction record)
    //$cbcounter = $_POST['deductions'];

    //creating employeeid
    $employee_id = 'CVSU'.generate_id();

		if(!empty($filename)){
      //file size
      $file_size = $_FILES["img"]["size"];
      //valid extension array (document Type)
      $valid_extension = array('jpg', 'jpeg', 'png');
      //get extension 
      $extension = pathinfo($_FILES["img"]["name"])['extension'];
      //set filename
      $new_filename = $employee_id.".".$extension;

      if (!in_array($extension, $valid_extension)) {
        $_SESSION['error'] = 'Invalid File Type';
      }else if ($file_size > 5242880) { //5MB Maximum file size
        $_SESSION['error'] = 'File size exceeds the maximum limit';
      }else{
			  move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/profile/'.$new_filename);
      }	
		}

    //set filename to new filename
    if ($new_filename!='') {
      $filename = $new_filename;
    }

		//insert employee prepared stmt
		$sql = $conn->prepare("INSERT INTO employees (employee_id, firstname, middlename, lastname, suffix, address, birthdate, mobile_no, contact_info, email, sex, photo, position_id, department_id, category_id, date_hired, sss_id, pagibig_id, philhealth_id, tin_num,created_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, NOW()) ");
    $sql->bind_param('ssssssssssssssssssss',$employee_id, $firstname,$middlename, $lastname,$suffix, $address, $birthdate,$mobile, $contact,$email, $sex, $filename,$position,$department,$category,$date_hired,$sss,$pagibig,$phealth,$tin);

		if($sql->execute()){

			// for ($i=0; $i < $cbcounter  ; $i++) { 
			// 	$cbname = "cb".$i;
			// 	if((isset($_POST[$cbname])) && ($category=='1')){
			// 		$did = $_POST[$cbname];
			// 		$sql2 = $conn->prepare("INSERT INTO deduction_employee (employee_id, deduction_id) VALUES(?,?) ");
   //        $sql2->bind_param('ss',$employee_id,$did);
			// 		$sql2->execute();
			// 	}	
			// }

			$day = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
			$inn = array("7:00", "7:30", "8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30");
			$outt = array("7:30", "8:00","8:30", "9:00","9:30", "10:00","10:30", "11:00","11:30", "12:00","12:30", "13:00","13:30", "14:00","14:30", "15:00","15:30", "16:00","16:30", "17:00","17:30", "18:00","18:30", "19:00","19:30", "20:00");

      //schedule prepared stmt
      $sql2 = $conn->prepare("INSERT INTO schedules (employee_id, time_in, time_out,day,isCheck) VALUES(?,?,?,?,'0') ");
      $sql2->bind_param('ssss',$employee_id,$in_param,$out_param,$day_param);

      //push to db (set to 0 as default) // means its off
			for ($i=0; $i < count($day); $i++) {
				for ($j=0; $j <count($inn); $j++){
          $in_param = $inn[$j];
          $out_param = $outt[$j];
          $day_param = $day[$i];
          $sql2->execute();
				}
			}

      // emp id auto generated (dont need prepared stmt)
			$sql3 = "INSERT INTO `emp_max_hours`(`employee_id`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`) VALUES ('$employee_id','0','0','0','0','0','0') ";
			$conn->query($sql3);
		
			$_SESSION['success'] = 'Employee added successfully';

		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../employee.php?page=employee_list');
?>