<?php
	require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['add'])){


		$Sdate = $_POST['Sdate'];
		$Edate = $_POST['Edate'];
		$Pdate = $_POST['pDate'];

		$a1 = date('md', strtotime($Sdate));
		$a2 = date('mdY', strtotime($Sdate));
		$code = "PC".$a1."TO".$a2;

		$sql = "INSERT INTO payroll_coverage_table (pay_code,Sdate, Edate,Pdate,payroll_status) VALUES ('$code','$Sdate', '$Edate','$Pdate','0')";
		if($conn->query($sql)){

			$sql2 ="SELECT * FROM employees WHERE date_hired < '$Edate'";
			$query2 = $conn->query($sql2);

			while($row = $query2->fetch_assoc()){
				if($row['employee_archive']=='0'){
            		 $sql3 = "INSERT INTO payroll_summary (`pay_code`, `employee_id`) VALUES ('$code', '".$row['employee_id']."')";
            		$conn->query($sql3);
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