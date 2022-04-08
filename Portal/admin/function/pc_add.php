<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){

    //get details
		$Sdate = $_POST['Sdate'];
		$Edate = $_POST['Edate'];
		$Pdate = $_POST['pDate'];

		$a1 = date('md', strtotime($Sdate));
		$a2 = date('mdY', strtotime($Sdate));
		$code = "PC".$a1."TO".$a2;

    //prepared stmt
		$sql = $conn->prepare("INSERT INTO payroll_coverage_table (pay_code,Sdate, Edate,Pdate,payroll_status) VALUES (?,?,?,?,'0') ");
    $sql->bind_param('ssss',$code,$Sdate,$Edate,$Pdate);

		if($sql->execute()){

			$sql2 =$conn->prepare("SELECT * FROM employees WHERE date_hired < ? ");
      $sql2->bind_param('s',$Edate);
      $sql2->execute();

			$result = $sql2->get_result();

			while($row = $result->fetch_assoc()){
				if($row['employee_archive']=='0'){
          $id_param = $row['employee_id'];
      		$sql3 = $conn->prepare("INSERT INTO payroll_summary (`pay_code`, `employee_id`) VALUES (?, ?) ");
            $sql3->bind_param('ss',$code,$id_param);
      		$sql3->execute();
      	}
			}

			$_SESSION['success'] = 'Payroll Coverage added successfully';
		}
		else{
			$_SESSION['error'] = 'Payroll Coverage added unsuccessfully';
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../payroll_list.php');

?>