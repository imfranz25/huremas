<?php 
$title ="Dashboard";
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/header.php");
?>
  <body>
  <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/preloader.php");  ?>
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
                                                                <h4 class="text-c-purple">64 %</h4>
                                                                <h6 class="text-muted m-b-0">On-time Rate</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-bar-chart f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">More Info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
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
                                                                <h4 class="text-c-green">14</h4>
                                                                <h6 class="text-muted m-b-0">Goals Completed</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-file-text-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">More info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Disciplinary Count-->
                                            <?php
                                                $id = $user['employee_id'];
                                                $sql = "SELECT COUNT(disciplinary_action.id) as dis_count FROM disciplinary_action WHERE employee_id='$id' ";
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
                                                                <h6 class="text-muted m-b-0">Diciplinary Action</h6>
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
                                                                <i class="fa fa-line-chart text-white f-16"></i>
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
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">More info</p>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <i class="fa fa-line-chart text-white f-16"></i>
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
                                                        <h5>Disciplinary Actions Report</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
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
                                                                    <th class="d-flex justify-content-center">Details</th>
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
                                                                    <td class="d-flex justify-content-center">
                                                                        <a href='#view_action' data-toggle='modal' data-id='<?php echo $row['reference_id']; ?>'><i class='fa fa-eye'></i></a>
                                                                    </td>
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

                                             <div class="col-xl-8 col-md-12 mt-4">
                                                <div class="card h-100">
                                                    <div class="card-header">
                                                        <h5>Upcoming Events</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="align-middle m-b-30">
                                                            <img src="../assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                            <div class="d-inline-block">
                                                                <h6>Halloween Party</h6>
                                                                <p class="text-muted m-b-0">lorem ipsum</p>
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <a href="#!" class="b-b-primary text-primary">View all</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  project and team member end -->

                                            <div class="col-xl-4 col-md-12 mt-4">
                                                <div class="card quater-card h-100">
                                                    <div class="card-block">
                                                        <h6 class="text-muted m-b-15">Your Attendance Records</h6>
                                                        <h5>48</h5>
                                                        <p class="text-muted">On-Time<span class="f-right">80%</span></p>
                                                        <div class="progress"><div class="progress-bar bg-c-blue" style="width: 80%"></div></div>
                                                        <h5 class="m-t-15">12</h5>
                                                        <p class="text-muted">Late<span class="f-right">19%</span></p>
                                                        <div class="progress"><div class="progress-bar bg-c-green" style="width: 19%"></div></div>
                                                        <h5 class="m-t-15">4</h5>
                                                        <p class="text-muted">Absent<span class="f-right">1%</span></p>
                                                        <div class="progress"><div class="progress-bar bg-c-green" style="width: 1%"></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  sale analytics end -->






                                            
                                        
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
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/scripts.php");  ?>
</body>
</html>
