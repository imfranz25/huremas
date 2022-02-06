<?php 
$title="Schedule";
include 'includes/session.php';
include 'includes/header.php';

?>
  <body>
  <?php include 'includes/preloader.php'; ?>
  
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
                                          <li class="breadcrumb-item"><a href="#!">Employee</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Schedules</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                        <?php
                            if(isset($_SESSION['error'])){
                            echo "
                                <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                ".$_SESSION['error']."
                                </div>
                            ";
                            unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['success'])){
                            echo "
                                <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-check'></i> Success!</h4>
                                ".$_SESSION['success']."
                                </div>
                            ";
                            unset($_SESSION['success']);
                            }
                        ?>
                            <!-- Main-body start -->


                            <div class="card">
                            <div class="card-header">
                                                <h5>Employee Schedule List</h5>
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
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead >
                                    <tr>
                                    <th width="3%">#</th>
                                    <th width="10%">Employee ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th width="5%">Department</th>
                                    <th>Position</th>
                                    <th width="4%">Type</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           $adds ="order by e.lastname DESC ";
                                           $sel = "";
                                           if(isset($_POST['depts'])) { 
                                            if ($_POST['depts']!="") {
                                              $adds = "WHERE e.department_id = '".$_POST['depts']."' order by e.lastname DESC";
                                            }else{
                                               $adds ="order by e.lastname DESC";
                                            }
                                            $sel = $_POST['depts'];
                                           }
                                            $sql = "SELECT *, e.id AS empid,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM employees e LEFT JOIN position p ON p.id=e.position_id LEFT JOIN department_category dc ON dc.id = e.department_id   $adds";
                                            $query = $conn->query($sql);
                                            $count=1;
                                            while($row = $query->fetch_assoc()){
                                                $type ="CNT";
                                                if($row['category_id']==2){
                                                    $type ="JO";
                                                }
                                            ?>
                                                <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $row['employee_id']; ?></td>
                                                <td class="text-center"><img src="<?php echo (!empty($row['photo']))? 'images/'.$row['photo']:'images/profile.jpg'; ?>" width="45px" height="45px"> </td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['code']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><button class='btn btn-success btn-sm edit btn-round' data-id='<?php echo $row['employee_id'];?>'><i class='fa fa-edit'></i> Manage Schedule</button></td>

                                              </tr>
                                              <?php
                                              $count++;
                                              }
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

    <?php include 'includes/schedule_modal.php'; ?>

    <?php include 'includes/scripts.php'; ?>

    
    <script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    window.location.assign("schedule_edit.php?eid="+id);
    
  });


});


$(document).ready(function() {
    $('#table1').DataTable();
} );
</script>

</body>
</html>


