<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['edit'])){

    //get details
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

    //query for img update
    $image_query = '';

    //process display img
		if(!empty($filename)){

      //select existing photo then delete it
      $select = $conn->prepare("SELECT photo FROM employees WHERE WHERE id = ? ");
      $select->bind_param('s',$empid);

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

        $select->execute();
        $result = $select->get_result();
        $row = $result->fetch_assoc();

        //DELETE  FILE
        if(file_exists("../uploads/profile/".$row['photo'])){
          if (unlink("../uploads/profile/".$row['photo'])) {
          }
        }
        //move new profile pic
        move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/profile/'.$new_filename);

        $image_query = ", photo = '$new_filename' ";

      } 
    }

    //get emp details
		$position = $_POST['position'];
		$department = $_POST['department'];
		$category = $_POST['category'];
		$date_hired = $_POST['date_hired'];
		$sss = $_POST['sss'];
		$pagibig = $_POST['pagibig'];
		$phealth = $_POST['phealth'];
		$tin = $_POST['tin'];

    //deductions for contract emp
		$cbcounter = $_POST['deductions'];
		
		$sql = $conn->prepare("UPDATE employees SET firstname = ?, middlename = ?, lastname = ?, suffix = ?, address = ?, birthdate = ?,mobile_no=?, contact_info = ?, email = ?, sex = ? ,position_id = ?, department_id=?,category_id = ?, date_hired = ?, sss_id = ? ,pagibig_id = ?, philhealth_id = ? ,tin_num = ? $image_query WHERE id = ? ");
    $sql->bind_param('sssssssssssssssssss',$firstname,$middlename,$lastname,$suffix,$address,$birthdate,$mobile,$contact,$email,$sex,$position,$department,$category,$date_hired,$sss,$pagibig,$phealth,$tin,$empid);

		if($sql->execute()){

      //delete deduc emp if have then insert new record if deduc is set
			$sql0 = $conn->prepare("DELETE FROM `deduction_employee` WHERE employee_id=? ");
      $sql0->bind_param('s',$empid1);
			$sql0->execute();

			for ($i=0; $i < $cbcounter  ; $i++) { 
				$cbname = "cb".$i;
				if((isset($_POST[$cbname])) && ($category=='1')){
					$did = $_POST[$cbname];
					$sql2 = $conn->prepare("INSERT INTO deduction_employee (employee_id, deduction_id) VALUES(?,?) ");
          $sql2->bind_param('ss',$empid1,$did);
          $sql2->execute();
				}	
			}

			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			$_SESSION['error'] = 'Connection Timeout';
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: ../employee.php?page=employee_list');
?>