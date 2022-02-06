<?php 
$title ="Dashboard";
require_once '../includes/path.php';
require_once 'includes/session.php';
require_once 'includes/header.php';

//get reports




$empcount=0;
$goalcount=0;
$dues=0;
$applicant=0;

$F_month = date('Y-m-01'); 
$L_month  = date('Y-m-t');
$month=date('M');
$day=date('l');


$sql = "SELECT * FROM employees WHERE employee_archive='0' ";
$query = $conn->query($sql);

$havesched=0;
$ontimes=0;
$laters=0;
while($row = $query->fetch_assoc()){
    $empcount++;
    $eeid=$row['employee_id'];
    $suptimeiin="";

    //get timein today
    $sql1 = "SELECT * FROM schedules WHERE employee_id='$eeid' AND day='$day'";
    
    $query1 = $conn->query($sql1);
    if($query1->num_rows>0){
    while($row1 = $query1->fetch_assoc()){
        if($row1['isCheck']=='1'){
            $havesched++;
            $suptimeiin=$row1['time_in'];
            
            break;
        }
    }
    }

    //get on time
    $todayin=date('Y-m-d').' '.$suptimeiin;
    
    $yesterday=date('Y-m-d', strtotime('-1 day'));
    $tom = date('Y-m-d', strtotime('+1 day'));
    

    $sql2 = "SELECT * FROM attendance WHERE employee_id='$eeid' AND time_in > '$yesterday' AND time_in < '$tom' ";
    $query2 = $conn->query($sql2);
    if($query2->num_rows>0){
    while($row2 = $query2->fetch_assoc()){
        $t1 = strtotime($todayin);
        $t2 = strtotime($row2['time_in'] );
        
         
        if($t1>=$t2){
            $ontimes++;
        }
        if($t1<$t2){
            $laters++;
        }

    }
    }

}

$rate=0;
$latep=0;
$absx=0;
if($havesched!=0){
  $rate=  round((($ontimes*100)/$havesched),0);
   $latep = round((($laters*100)/$havesched),0);
 $absx = round(((($havesched-($ontimes+$laters))*100)/$havesched),0);
 
}


$sql = "SELECT COUNT(*) as counts FROM task WHERE completed > '$F_month' AND completed < '$L_month' ";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$goalcount = $row['counts'];

$sql = "SELECT COUNT(*) as counts FROM task WHERE due_date > '$F_month' AND due_date < '$L_month' ";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$dues = $row['counts'];

$sql = "SELECT COUNT(*) as counts FROM applicant WHERE stage = 'New Candidates' ";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$applicant = $row['counts'];



?>
  <body>
  <?php include_once 'includes/preloader.php'; ?>
  <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">         
        <?php require_once 'includes/navbar.php'?>
        <?php require_once 'includes/sidebar.php'?>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple"><?php echo $empcount;?>
                                                                </h4>
                                                                <h6 class="text-muted m-b-0">Total Employee</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-users  f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <a href='employee.php?page=employee_list'><p class="text-white m-b-0">More Info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-angle-double-right text-white f-16"></i></a>
                                                            </div>
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green"><?php echo $goalcount." out of ".$dues;?></h4>
                                                                <h6 class="text-muted m-b-0">Task Comp. (<?php echo $month; ?>)</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-file-text-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9"><a href='tasks.php' >
                                                                <p class="text-white m-b-0">More info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-angle-double-right text-white f-16"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red"><?php echo $rate."%" ?></h4>
                                                                <h6 class="text-muted m-b-0">On time % today</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-calendar-check-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">More Info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-angle-double-right text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-blue"><?php echo $applicant; ?></h4>
                                                                <h6 class="text-muted m-b-0">Pending Aplicant</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-hand-o-down f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-9"><a  href='applicant.php'>
                                                                <p class="text-white m-b-0">More info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-angle-double-right text-white f-16"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--   end -->

                                            <!-- Pending Disciplinary Tasks start -->
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Pending Disciplinary Tasks</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>
                                                                        Assigned to</th>
                                                                    <th>Department</th>
                                                                    <th>Due Date</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php

                                                                    //events 

                                                            $sql = "SELECT *,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,t.description as td FROM task t left join employees e on e.employee_id=t.employee_id LEFT JOIN department_category ddc ON e.department_id=ddc.id LEFT JOIN position p ON p.id=e.position_id WHERE t.status='0' order by unix_timestamp(t.date_created) asc";
                                                            $query = $conn->query($sql);
                                                            $count = $query->num_rows;

                                                            if ($count > 0) :
                                                                while ($row = $query->fetch_assoc()) :

                                                                    $dues=date_create($row['due_date']);


                                                                    ?>

                                                            <tr>
                                                            <td>
                                                                <div class="d-inline-block align-middle">
                                                                    <img src="../assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                    <div class="d-inline-block">
                                                                        <h6><?php echo $row['name']; ?></h6>
                                                                        <p class="text-muted m-b-0"><?php echo $row['td']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><?php echo $row['code']; ?></td>
                                                            <td><?php echo date_format($dues,"F d, Y"); ?></td>
                                                        </tr>


                                                        <?php endwhile;endif;?>

                                                                
                                                              
                                                                </tbody>
                                                            </table>
                                                            <div class="text-right m-r-20">
                                                                <a href="tasks.php" class=" b-b-primary text-primary">View all Tasks</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-12">
                                                <!-- Calendar -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h4>Calendar</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div id="caleandar">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <!-- EVENTS start -->
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Upcoming Events</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>
                                                                        Event Name</th>
                                                                    <th>Start</th>
                                                                    <th>End</th>
                                                                    <th class="text-right">Venue</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php

                                                                    //events 
                                                            $date_today = date('Y-m-d');
                                                            $sql = "SELECT * FROM events WHERE event_date >= '$date_today' ;";
                                                            $query = $conn->query($sql);
                                                            $count = $query->num_rows;

                                                            if ($count > 0) :
                                                                while ($row = $query->fetch_assoc()) :
                                                                     $date_event=date_create($row['event_date']);
                                                                     $date_from=date_create($row['event_from']);
                                                                     $date_to=date_create($row['event_to']);

                                                                    ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <img src="uploads/events/<?php echo $row['display_image']; ?>" alt="event image" class="img-radius img-40 align-top m-r-15">
                                                                            <div class="d-inline-block">
                                                                                <h6> <?php echo $row['event_name']; ?></h6>
                                                                                <p class="text-muted m-b-0">
                                                                                <?php echo date_format($date_event,'d'); ?> <?php echo date_format($date_event,'F'); ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><?php echo date_format($date_from,"h:i A"); ?></td>
                                                                    <td><?php echo date_format($date_to,"h:i A"); ?></td>
                                                                    <td class="text-right"><?php echo $row['event_venue']; ?></label></td>
                                                                </tr>

                                                            <?php endwhile;endif;
                                                             ?>





                                                                </tbody>
                                                            </table>
                                                            <div class="text-right m-r-20">
                                                                <a href="events.php" class=" b-b-primary text-primary">View all Events</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
 

                                            <div class="col-xl-4 col-md-12">
                                                <div class="card quater-card">
                                                    <div class="card-block">
                                                        <h6 class="text-muted m-b-15">Today's Attendance</h6>
                                                        <h5><?php echo $ontimes; ?></h5>
                                                        <p class="text-muted">On-Time<span class="f-right"><?php echo $rate."%" ?></span></p>
                                                        <div class="progress"><div class="progress-bar bg-c-blue" style="width: <?php echo $rate."%" ?>"></div></div>
                                                        <h5 class="m-t-15"><?php echo $laters; ?></h5>
                                                        <p class="text-muted">Late<span class="f-right"><?php echo $latep."%" ?></span></p>
                                                        <div class="progress"><div class="progress-bar bg-c-green" style="width: <?php echo $latep."%" ?>"></div></div>
                                           
                                                    </div>
                                                </div>
                                            </div>
       
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/scripts.php'; ?>
</body>
</html>
