<?php 
  $title ="Payroll Summary";
  require_once '../includes/path.php';
  require_once("../admin/includes/session.php");
  require_once("../admin/includes/header.php");
?>

<body>
  <?php include_once("../admin/includes/preloader.php");  ?>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">         
        <?php include 'includes/navbar.php'?>
        <?php include 'includes/sidebar.php'?>
        <div class="pcoded-content">
          <!-- Page-header start -->
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Payslip</h5>
                    <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                      <a href="index.php"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#">Payslip</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Page-header end -->

          <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="card">
              <div class="card-body">
                <div class="card-block table-border-style">
                  <div class="table-responsive">
                    <table id="table1" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>  
                          <th>Payroll Period</th>
                          <th>Gross Amount</th>
                          <th>Deductions</th>
                          <th>Net Income</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $ueid = $user['employee_id'];
                          $sqla = "SELECT * FROM payroll_coverage_table";
                          $queryz = $conn->query($sqla);

                          while($rowx = $queryz->fetch_assoc()){
                            $pc=$rowx['pay_code'];
                            $sql = "SELECT *,ps.id as psid,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,e.employee_id as eeid FROM payroll_summary ps LEFT JOIN employees e on ps.employee_id=e.employee_id LEFT JOIN position p ON p.id=e.position_id LEFT JOIN department_category dc ON dc.id = e.department_id LEFT JOIN payroll_coverage_table pc on pc.pay_code=ps.pay_code LEFT JOIN schedules s ON s.id=e.schedule_id LEFT JOIN emp_max_hours emh ON emh.employee_id=ps.employee_id WHERE ps.pay_code = '$pc' AND ps.employee_id='$ueid' order by e.lastname DESC";
                            $query = $conn->query($sql);

                            while($row = $query->fetch_assoc()){
                              $type ="CNT";
                              if($row['category_id']==2) $type ="JO";
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
                              $late=0;
                              if($row['category_id']==1) $rate = $rate/26;
                              $rate = round($rate,2);

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
                                    $rate=round($rate,2);
                                    $rate = $rate/$row[$day];
                                  }
                                  $late += (($row[$day]-$hours) * $rate );
                                  $paidHours += $hours;
                                  $income += ($paidHours * $rate);
                              	}//end while
                              }//end if

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

                              $taxpercent=0;
                              if($income<720000){
                                $taxpercent=0.10;
                              }else{
                                $taxpercent=0.15;
                              }
                              $Tdeduction = $Tdeduction +($income*$taxpercent);
                          ?>
                          <tr>
                            <td>
                              <?php
                                $ts1 = strtotime($rowx['Sdate']);
                                $ts2 = strtotime($rowx['Edate']);
                                $dd1 = date('M d, Y', $ts1);
                                $dd2 = date('M d, Y', $ts2);
                                echo $dd1." to ".$dd2; ?>
                              </td>
                            <td><?php echo "&#8369; ".round($income,2); ?></td>
                            <td><?php echo "&#8369; ".round($Tdeduction,2); ?></td>
                            <td>
                              <?php echo "&#8369; ".round(($income-$Tdeduction),2); 
                              ?>
                            </td>
                            <td>
                              <button class="btn btn-success btn-sm view btn-flat" data-id="<?php echo $row['psid']; ?>">
                                <i class="fa fa-eye"></i> View
                              </button>
                            </td>
                          </tr>
                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Main-body end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once('includes/payslip_modal.php'); ?>
  <?php require_once("../admin/includes/scripts.php"); ?>
    
<script>

function printDiv2() {
  var divToPrint = document.getElementById('modalbody');
  newWin = window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}


function payslip_row(id){
  $.ajax({
    type: 'POST',
    url: 'function/payslip_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //view
      $('#pday').html(response.Pdate);
      $('#pcovered').html(response.Sdate+" - "+response.Edate);
      $('#ename').html(response.name);

      //earnigs
      var block =""; 
      var block2 ="";
      var block3 ="";
      var block4 ="";
      var block5 ="";
         
      if(response.category_id==1){
        block ="<td><label class='col-sm-9 col-form-label '>Daily Wage:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+response.payperday+"</label></td>"
         block2 ="<td><label class='col-sm-9 col-form-label '>Number of Days:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>"+response.daypresent+"</label></td>"
        block3 = "<td><label class='col-sm-9 col-form-label '>Total Basic Salary:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+(response.payperday*response.daypresent)+"</label></td>";
        block4 = "<td><label class='col-sm-9 col-form-label '>Late:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+(response.late)+"</label></td>";
        block5 = "<td><label class='col-sm-9 col-form-label '>Total Gross Salary:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+response.totallgross+"</label></td>";

      }else{
        block ="<td><label class='col-sm-9 col-form-label '>Rate Per Hour:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+response.rate+"</label></td>";
        block2 ="<td><label class='col-sm-9 col-form-label '>Number of Paid Hours:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>"+response.paidhours+"</label></td>";
        block3 = "<td><label class='col-sm-9 col-form-label '>Total Basic Salary:</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+(response.rate*response.paidhours)+"</label></td>";

        block5 = "<td><label class='col-sm-9 col-form-label '>Total Gross Salary:</label></td>"+
        "<td><label class='col-sm-3 col-form-label' >&#8369; "+response.totallgross+"</label></td>";
      }

      $('#tg').val(response.totallgross);
      $('#earnings').html(block);
      $('#numdays').html(block2); 
      $('#total_salary').html(block3);
      $('#adjust').html(block4);
      $('#total').html(block5);

      var income = $('#tg').val();
      payslip_row2(id,income);
    }
  });
}

function payslip_row2(eid,income){
  $.ajax({
    type: 'POST',
    url: 'function/payslip_row.php',
    data: {eid:eid,income:income},
    dataType: 'json',
    success: function(response){
      //earnigs
      var block ="<table  class='table table-bordered table-striped' >"; 
      var amt="";
      var totality=0;

      for (var i = 0; i<Object.keys(response).length; i++) {
        if(response[i].deduction_type=="Fixed Amount"||response[i].deduction_type=="Hour Amount"){
          amt="&#8369; "+response[i].amount_rate;
          totality = totality+response[i].amt;
        }else{
          amt=response[i].amount_rate+"% < &#8369;"+response[i].deduction_limit;
          totality = totality+response[i].amt;
        }
         block =block+"<tr><td><label class='col-sm-9 col-form-label '>"+response[i].deduction_name+" - ("+amt+"):</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+response[i].amt+"</label></td></tr>";
      }

      var taxpercent=0;

      if(income<720000){
        taxpercent=10;
      }else{
        taxpercent=15;
      }

      var totaltax = Math.round((((taxpercent*0.01)*income) + Number.EPSILON) * 100) / 100

      block =block+"<tr><td><label class='col-sm-9 col-form-label '>Tax ("+taxpercent+"%):</label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+totaltax+"</label></td></tr>";

      totality=totality+totaltax;

      block =block+"<tr><td><label class='col-sm-9 col-form-label '>Total Deductions: </label></td>"+
        "<td><label class='col-sm-3 col-form-label '>&#8369; "+totality+"</label></td></tr>";

      block =block+"</table> ";
      $('#deduct').html(block);

      var net = Math.round(((income - totality) + Number.EPSILON) * 100) / 100

      var block2 = "<td><label class='col-sm-9 col-form-label '>Net Salary:</label></td>"+
        "<td><label class='col-sm-3 col-form-label' >&#8369; "+net+"</label></td>";

      $('#netsalary').html(block2);
    }
  });
}


$(document).ready(function() {

  $('#table1').DataTable();

  $(document).on('click','.view',function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    payslip_row(id);
  });

});

</script>

</body>
</html>


