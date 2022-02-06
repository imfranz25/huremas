<?php 
$title ="Dashboard";
require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/header.php");





?>
  <body>
  <?php require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/preloader.php");  ?>
  <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">         
        <?php include 'includes/navbar.php'?>
        <?php include 'includes/sidebar.php';


//get reports


$trainings=0;




$month=date('M');
$month2=date('F');

$id = $user['employee_id'];

$sql = "SELECT * FROM employees WHERE employee_id='$id' ";
$query = $conn->query($sql);

$havesched=0;
$ontimes=0;
$laters=0;
$ot=0;
$F_month = date('Y-m-01'); 
$L_month  = date('Y-m-t');

$tt1 = strtotime($F_month );
$tt2 = strtotime($L_month);
while($row = $query->fetch_assoc()){
    $eeid=$row['employee_id'];
    


    
    $yesterday=date($F_month, strtotime('-1 day'));
    $tom = date($L_month, strtotime('+1 day'));
    

    $sql2 = "SELECT * FROM attendance WHERE employee_id='$eeid' AND time_in > '$yesterday' AND time_in < '$tom' ";
    $query2 = $conn->query($sql2);
    while($row2 = $query2->fetch_assoc()){
        $ot++;

    }

    
     $tt1 +=86400;



}//while


$sql = "SELECT COUNT(*) as counts FROM training_record WHERE status = 'Finished' AND employee_id = '$id' ";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$trainings = $row['counts'];



        ?>
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
                                                                <h4 class="text-c-purple"><?php echo $ot; ?></h4>
                                                                <h6 class="text-muted m-b-0">Present Count (Jan)</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-bar-chart f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9"><a href="dtr.php">
                                                                <p class="text-white m-b-0">More Info</p>
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
                                                                <h4 class="text-c-green"><?php echo $trainings; ?></h4>
                                                                <h6 class="text-muted m-b-0">Trainings Completed</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-file-text-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9"><a href="training.php">
                                                                <p class="text-white m-b-0">More info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-angle-double-right text-white f-16"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Disciplinary Count-->
                                            <?php
                                                $id = $user['employee_id'];
                                                $sql = "SELECT COUNT(*) as dis_count FROM task WHERE employee_id='$id' AND status='2' ";
                                                $query=$conn->query($sql);
                                                $row =$query->fetch_assoc();


                                            ?>
                                            <!--Disciplinary Count END-->

                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red"><?php echo $row['dis_count']; ?></h4>
                                                                <h6 class="text-muted m-b-0">Pending Task</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-calendar-check-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9"><a href="tasks.php">
                                                                <p class="text-white m-b-0">More Info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-angle-double-right text-white f-16"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <!--Pending CA Count-->
                                            <?php
                                                $sql = "SELECT COUNT(cash_advance.id) as ca_count FROM cash_advance WHERE employee_id='$id' AND status ='Pending' ";
                                                $query=$conn->query($sql);
                                                $row =$query->fetch_assoc();
                                            ?>
                                            <!--Pending CA Count END-->



                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-blue"><?php echo $row['ca_count']; ?></h4>
                                                                <h6 class="text-muted m-b-0">Pending Cash Adv</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-hand-o-down f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-blue">
                                                        <div class="row align-items-center">
                                                            <div class="col-9"><a href="cash_advance.php">
                                                                <p class="text-white m-b-0">More info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-angle-double-right text-white f-16"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- task, page, download counter  end -->

                                            <!--  project and team member start -->
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card table-card h-100">
                                                    <div class="card-header">
                                                        <h5>My Disciplinary Actions Report</h5>
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
                                                                    <th>Issued Date</th>
                                                                    <th>Issued By</th>
                                                                    <th>Subject</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <?php 
                                                                    $sql = "SELECT * FROM disciplinary_action LEFT JOIN disciplinary_category ON disciplinary_category.id=disciplinary_action.reason WHERE disciplinary_action.employee_id = '$id' ORDER BY disciplinary_action.issued_date DESC ";
                                                                    $query = $conn->query($sql);
                                                                    while($row = $query->fetch_assoc()){
                                                                        if ($row['action']=='') {
                                                                            continue;
                                                                        }
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo (new DateTime($row['issued_date']))->format('F d, Y'); ?></td>
                                                                    <td>
                                                                        <div class="d-inline-block align-middle">
                                                                            <div class="d-inline-block">
                                                                                <h6><?php echo $row['issued_by']; ?></h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><?php echo $row['title'];  ?></td>
                                                                    <td><?php echo $row['action'];  ?></td>
                                                                    <!-- <td class="d-flex justify-content-center">
                                                                        <a href='#view_action' data-toggle='modal' data-id='<?php //echo $row['reference_id']; ?>'><i class='fa fa-eye'></i></a>
                                                                    </td> -->
                                                                </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <div class="text-right m-r-20">
                                                                <a href="disciplinary.php" class=" b-b-primary text-primary">View all Records</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-12">
                                                <!-- Calendar -->
                                                <div class="card h-100">
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

                                             <div class="col-xl-12 col-md-12 mt-4">
                                                <div class="card h-100">
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
                                                                            <img src="../admin/uploads/events/<?php echo $row['display_image']; ?>" alt="event image" class="img-radius img-40 align-top m-r-15">
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
                                
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--  member end -->

                               
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
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/scripts.php");  ?>
</body>
</html>
