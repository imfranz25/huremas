<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';
	
	if(isset($_POST['emp_code'])){

		$id = $user['employee_id'];
		$code = $_POST['emp_code'];
		$sql = "SELECT *, (SELECT COUNT(employee_id) FROM training_record WHERE training_code='$code' AND training_record.employee_id=employees.employee_id) AS count FROM employees LEFT JOIN position ON position.id=employees.position_id LEFT JOIN department_category ON department_category.id=employees.department_id WHERE employees.employee_id != '$id' ";
		$query = $conn->query($sql);
		$output = array();

		//FETCH -> AND FILTER IT (SERVER SIDE)
		while ($row = $query->fetch_assoc()) {
			//DISREGARD EMPLOYEE IF HES ALREADY IN THE TRAINING (HAVE REQUEST / REJECTED)
			if ($row['count']>0) {
				continue;
			}
			//APPEND ELIGIBLE EMPLOYEES TO NEW ARRAY (WITH THEIR DATA)
			$info = array();
			$info['employee_id'] = $row['employee_id'];
			$info['fullname'] = $row['firstname'].' '.$row['lastname'];
			$info['position'] = $row['description'];
			$info['department'] = $row['title'];
			array_push($output, $info);
		}
	
		echo json_encode($output);

	}else if (isset($_POST['record'])) {

    // get id
		$record = $_POST['record'];
    // prepared stmt
		$sql = $conn->prepare("SELECT * FROM training_record LEFT JOIN employees ON employees.employee_id=training_record.employee_id LEFT JOIN position ON position.id=employees.position_id LEFT JOIN department_category ON department_category.id=employees.department_id LEFT JOIN training_list ON training_list.training_code=training_record.training_code LEFT JOIN training_course ON training_course.id=training_list.training_course WHERE reference_no =? ");
    $sql->bind_param('s',$record);
    $sql->execute();
    // fetch data
		$query = $sql->get_result();
		$row = $query->fetch_assoc();
		echo json_encode($row);

	} else {
    header('location: ../training_vendor.php');
  }

?>