<?php 
  require_once("../../includes/path.php");
  require_once("../../admin/includes/session.php");

	if(isset($_POST['id'])){

    // get id
		$id = $_POST['id'];
    // prepared select stmt
		$sql = $conn->prepare("SELECT *,ps.id 
      AS psid,concat(e.lastname,', ',e.firstname,' ',e.middlename) 
      AS name,e.employee_id 
      AS eeid 
      FROM payroll_summary ps 
      LEFT JOIN employees e ON ps.employee_id=e.employee_id 
      LEFT JOIN position p ON p.id=e.position_id 
      LEFT JOIN department_category dc ON dc.id = e.department_id 
      LEFT JOIN payroll_coverage_table pc on pc.pay_code=ps.pay_code 
      LEFT JOIN schedules s ON s.id=e.schedule_id 
      LEFT JOIN emp_max_hours emh ON emh.employee_id=ps.employee_id 
      WHERE ps.id = ? ");
    $sql->bind_param('s',$id);
    $sql->execute();
    //fetch data
		$query = $sql->get_result();
		$row = $query->fetch_assoc();

    //INCOME

		//get attendnace
  	$StartDate=$row['Sdate'];
  	$EndDate=$row['Edate'];
  	$eid= $row['eeid'];

    // prepared stmt
  	$sql2= $conn->prepare("SELECT * FROM attendance a WHERE employee_id=? AND time_in >= ? AND time_in <= ? ");
    $sql2->bind_param('sss',$eid,$StartDate,$EndDate);
    $sql2->execute();
  	$query2 = $sql2->get_result();

  	//income calculation from dtr getting total paid days
  	$paidHours=0;
    $income =0;
    $rate=$row['rate'];

    if($row['category_id']==1) $rate = $rate/26;

    $rate2 = $rate;
    $row['payperday'] = round($rate,2);
    $rate = round($rate,2);
    $daycount=0;
    $late=0;

    if($query2->num_rows>0){

    	while($row2 = $query2->fetch_assoc()){
        $timestamp = strtotime($row2['time_in']);
        $day = date('l', $timestamp);
    		$t1 = strtotime($row2['time_in'] );
        $t2 = strtotime($row2['time_out'] );
        $diff = $t2 - $t1;
        $hours = $diff / 3600 ;

        //checking max hours per day
        if($row2['time_out']==null) $hours=0;
        if($hours>=$row[$day]) $hours=$row[$day];
        if($row['category_id']==1) $rate = $rate/$row[$day];

        // calculate income
        $late += (($row[$day]-$hours) * $rate );
        $paidHours += $hours;
        $income += ($paidHours * $rate );
        $daycount++;
        
    	}//end while
  	
    }//end if

    $tg=0;

    if($row['category_id']==1){
      $tg= ($daycount*$rate2)-$late;
    }else{
     	$tg=$income;
     }

    // calculate earnings
    $row['totallgross']=round($tg,2);
    $row['late'] = round($late,2);
    $row['daypresent']=$daycount;
    $row['paidhours'] = round($paidHours,2);
    $row['totalearnings'] = $income;

    

    // DEDUCTIONS

    $Tdeduction =0;
    $amt_rate=0;

    //get total deduction
    $sql3= $conn->prepare("SELECT * 
      FROM deduction_employee de 
      LEFT JOIN deduction d 
      ON de.deduction_id = d.id 
      WHERE de.employee_id=? ");

    $sql3->bind_param('s',$eid);
    $sql3->execute();
    $query3 = $sql3->get_result();

    if($query3->num_rows>0){
      while($row3 = $query3->fetch_assoc()){
        if ($row3['deduction_type'] =="Fixed Amount" || $row3['deduction_type'] =="Hour Amount") {
          $amt_rate += $row3['amount_rate'];  
        }else{
          $des =  ($row3['amount_rate']*$income)*0.01;
          if(($row3['deduction_limit']!=0)&&($des>$row3['deduction_limit'])){
            $amt_rate += $row3['deduction_limit'];
          }else{
            $amt_rate += $des;
          }
        }
      }
      $Tdeduction = $amt_rate;
    }

    $row['totaldeduction'] = $Tdeduction;

		echo json_encode($row);

	} else if(isset($_POST['eid'])){

    // get ids
		$id = $_POST['eid'];
		$income = $_POST['income'];

    // prepared stmt
		$sql = $conn->prepare("SELECT *,ps.id 
      AS psid,concat(e.lastname,', ',e.firstname,' ',e.middlename) 
      AS name,e.employee_id 
      AS eeid 
      FROM payroll_summary ps 
      LEFT JOIN employees e ON ps.employee_id=e.employee_id 
      LEFT JOIN position p ON p.id=e.position_id 
      LEFT JOIN department_category dc ON dc.id = e.department_id 
      LEFT JOIN payroll_coverage_table pc ON pc.pay_code=ps.pay_code 
      LEFT JOIN schedules s ON s.id=e.schedule_id 
      LEFT JOIN emp_max_hours emh ON emh.employee_id=ps.employee_id 
      WHERE ps.id = ? ");

    // execute and fetch data
    $sql->bind_param('s',$id);
    $sql->execute();
		$query = $sql->get_result();
		$row = $query->fetch_assoc();

    // inititalize and get row eeid (employe id)
		$deductions = array();
		$eid= $row['eeid'];

    //get total deduction
    $sql3= $conn->prepare("SELECT * 
      FROM deduction_employee de 
      LEFT JOIN deduction d ON de.deduction_id = d.id 
      WHERE de.employee_id=? ");

    // execute and get result
    $sql3->bind_param('s',$eid);
    $sql3->execute();
    $query3 = $sql3->get_result();

    // initialziation
    $amt_rate=0;
    $Tdeduction =0;

    if($query3->num_rows>0){
      while($row3 = $query3->fetch_assoc()){
      	if ($row3['deduction_type'] =="Fixed Amount" || $row3['deduction_type'] =="Hour Amount") {
          $amt_rate = $row3['amount_rate'];  
        }else{
          $des =  ($row3['amount_rate']*$income)*0.01;
          if(($row3['deduction_limit']!=0)&&($des>$row3['deduction_limit'])){
            $amt_rate = $row3['deduction_limit'];
          }else{
            $amt_rate = $des;
          }
        }
        $row3['amt'] = round($amt_rate,2);
      	array_push($deductions,$row3);
      }
    }

		echo json_encode($deductions);

	} else {
    header('location: ../payroll_summary.php');
  }


?>