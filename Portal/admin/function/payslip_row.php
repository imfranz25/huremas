<?php 
  require_once '../../includes/path.php';
	require_once '../includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		 $sql = "SELECT *,ps.id as psid,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,e.employee_id as eeid FROM payroll_summary ps LEFT JOIN employees e on ps.employee_id=e.employee_id LEFT JOIN position p ON p.id=e.position_id LEFT JOIN department_category dc ON dc.id = e.department_id LEFT JOIN payroll_coverage_table pc on pc.pay_code=ps.pay_code LEFT JOIN schedules s ON s.id=e.schedule_id LEFT JOIN emp_max_hours emh ON emh.employee_id=ps.employee_id WHERE ps.id = '$id'";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


    //INCOME


		//get attendnace
    	$StartDate=$row['Sdate'];
    	$EndDate=$row['Edate'];
    	$eid= $row['eeid'];
    	$sql2= "SELECT * FROM attendance a WHERE employee_id='$eid' AND time_in >= '$StartDate' AND time_in <= '$EndDate'";
    	$query2 = $conn->query($sql2);
    	//income calculation from dtr getting total paid days
    	$paidHours=0;
      $income =0;
      $rate=$row['rate'];

      if($row['category_id']==1){
        $rate = $rate/26;
      }

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
            if($row2['time_out']==null){$hours=0;}
            if($hours>=$row[$day]){$hours=$row[$day];}
            if($row['category_id']==1){
              $rate = $rate/$row[$day];
            }

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

      $row['totallgross']=round($tg,2);



      $row['late'] = round($late,2);
      $row['daypresent']=$daycount;
      $row['paidhours'] = round($paidHours,2);
      $row['totalearnings'] = $income;
 
      
      

      
      



        // DEDUCTIONS

      $Tdeduction =0;
      //get total deduction
      $sql3= "SELECT * FROM deduction_employee de LEFT JOIN deduction d ON de.deduction_id = d.id WHERE de.employee_id='$eid'";
      $query3 = $conn->query($sql3);
      $amt_rate=0;
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
	}


	if(isset($_POST['eid'])){
		$id = $_POST['eid'];
		$income = $_POST['income'];
		$sql = "SELECT *,ps.id as psid,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,e.employee_id as eeid FROM payroll_summary ps LEFT JOIN employees e on ps.employee_id=e.employee_id LEFT JOIN position p ON p.id=e.position_id LEFT JOIN department_category dc ON dc.id = e.department_id LEFT JOIN payroll_coverage_table pc on pc.pay_code=ps.pay_code LEFT JOIN schedules s ON s.id=e.schedule_id LEFT JOIN emp_max_hours emh ON emh.employee_id=ps.employee_id WHERE ps.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$deductions = array();
		$eid= $row['eeid'];
      //get total deduction
      $sql3= "SELECT * FROM deduction_employee de LEFT JOIN deduction d ON de.deduction_id = d.id WHERE de.employee_id='$eid'";
      $query3 = $conn->query($sql3);
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

	}


?>