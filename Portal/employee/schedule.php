<?php 
  $title="Schedule";
  require_once '../includes/path.php';
  require_once("../admin/includes/session.php");
  require_once("../admin/includes/header.php");
?>

<style type="text/css">
  .tds:hover{
    background-color: #FF9900;
  }

  .tds.selected {
   background-color: #11c15b;
}
</style>

<script type="text/javascript">
  var datas=[];
</script>

<body>
  <?php include_once("../admin/includes/preloader.php");  ?>
  <?php $eid=$user['employee_id'];  ?>
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
                    <h5 class="m-b-10">Employee Schedule</h5>
                    <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                      <a href="index.php"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#!">Schedules</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Page-header end -->

          <div class="pcoded-inner-content">
            <?php include_once '../admin/includes/session_alert.php'; ?>         
            <!-- Main-body start -->
            <div class="card">
              <div class="card-header">
                <button type="button" onClick="printDiv()" class="btn btn-mat waves-effect waves-light btn-success" style='float:right;'><i class="fa fa-print"></i>Print</button>
                  <h5>Schedule of 
                    <?php 
                      $sql = "SELECT *, e.id AS empid,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM employees e LEFT JOIN position p ON p.id=e.position_id LEFT JOIN department_category dc ON dc.id = e.department_id   WHERE e.employee_id='$eid'";
                      $query = $conn->query($sql);
                      $row = $query->fetch_assoc();
                      echo $row['name'];
                    ?>
                  </h5>
                  <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                      <li><i class="fa fa fa-wrench open-card-option"></i></li>
                      <li><i class="fa fa-window-maximize full-card"></i></li>
                      <li><i class="fa fa-refresh reload-card"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="box-body">
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table id='schedtb'  class="table table-striped table-bordered" style="width:100%" border="1" cellpadding="3">
                        <thead >
                          <tr>
                            <th width="5%" class="text-center">Time</th>
                            <th width="5%">Monday</th>
                            <th width="5%">Tuesday</th>
                            <th width="5%">Wednesday</th>
                            <th width="5%">Thursday</th>
                            <th width="5%">Friday</th>
                            <th width="5%">Saturday</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $day = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                            $inn = array("7:00", "7:30", "8:00", "8:30", "9:00", "9:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30", "18:00", "18:30", "19:00", "19:30");
                            $outt = array("7:30", "8:00","8:30", "9:00","9:30", "10:00","10:30", "11:00","11:30", "12:00","12:30", "13:00","13:30", "14:00","14:30", "15:00","15:30", "16:00","16:30", "17:00","17:30", "18:00","18:30", "19:00","19:30", "20:00");
                            $maxH = array(0,0,0,0,0,0);
                            for ($j=0; $j <count($inn); $j++){
                          ?>

                          <tr>
                            <td class="text-center">
                              <?php echo $inn[$j]." - ".$outt[$j]; ?>
                            </td>
                            <?php  
                              for ($i=0; $i < count($day); $i++) {
                                $sql = "SELECT *,s.id as sid FROM schedules s LEFT JOIN employees e ON s.employee_id=e.employee_id WHERE s.employee_id='$eid' AND s.day='$day[$i]' AND s.time_in='$inn[$j]'";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                            ?>
                            <td onmouseover="toolnote(this)" class="tds" id="<?php echo $row['sid']; ?>" >
                              <?php
                                if($row['isCheck']==1){
                                  echo "<script>
                                  datas.push('".$row['sid']."');
                                  </script>";
                                  $maxH[$i]+=0.5;
                                }
                              ?>         
                            </td>
                            <?php 
                                }//end while 
                              }
                            ?>
                          </tr>

                          <?php }
                            $sql1 = "UPDATE emp_max_hours SET `Monday`='$maxH[0]',`Tuesday`='$maxH[1]',`Wednesday`='$maxH[2]',`Thursday`='$maxH[3]',`Friday`='$maxH[4]',`Saturday`='$maxH[5]' WHERE employee_id='$eid'";
                            $conn->query($sql1);
                          ?>
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

  <?php require_once("../admin/includes/scripts.php");  ?>

<script>

// PUPOLATE SELECT OPTION
for (var i = datas.length - 1; i >= 0; i--) {
  $("#"+datas[i]).addClass("selected");
}

function arrayRemove(arr, value) { 
  return arr.filter(function(ele){ 
    return ele != value; 
  });
}

function printDiv() {
  var divToPrint = document.getElementById('schedtb');
  for (var i = datas.length - 1; i >= 0; i--) {
    $("#"+datas[i]).css("background-color","#11c15b");
  }
  newWin = window.open("");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
  endingx();
}

function endingx(){
  for (var i = datas.length - 1; i >= 0; i--) {
    $("#"+datas[i]).css("background-color","");
  }
}

</script>

</body>
</html>


