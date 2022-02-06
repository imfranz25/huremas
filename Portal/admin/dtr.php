<?php 
$title ="Daily Time Records";
include 'includes/session.php';
include 'includes/header.php';
?>
 
  <body>
  <?php include 'includes/preloader.php'; ?>
  
  <div id="pcoded" class="pcoded">
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
                                          <h5 class="m-b-10">Attendance</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Daily Time Records</a>
                                          </li><li class="breadcrumb-item"><a href="#!">Attendance</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">

                          <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
                            <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-warning'></i> Note !</h4>
                             <label id="warning"></label>
                          </div>

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
                            <div class="row">
                               <div class="col-lg-2">
                                <label for="">Date Filter - Start</label>
                                <form method="POST" id="date_form" action="<?php $_PHP_SELF ?>">
                                <input type="date" class="form-control form-control-lg" name="shown_date" id="shown_date" value="<?php if(isset($_POST['shown_date'])){echo $_POST['shown_date'];}else{echo date('Y-m-d');}?>">
                                
                              </div>
                              <?php 
                              $today= isset($_POST['shown_date']) ?  $_POST['shown_date'] : date('Y-m-d');
      
                              ?>
                              
                              <div class="col-lg-2">
                                <label for="">Date Filter - End</label>
    
                                <input type="date" class="form-control form-control-lg" name="shown_date2" id="shown_date2" value="<?php if(isset($_POST['shown_date2'])){echo $_POST['shown_date2'];}else{echo date('Y-m-d');}?>">
                                </form>
                              </div>
                              
                              <?php 
 
                              $tom2= isset($_POST['shown_date2']) ? date('Y-m-d',(strtotime ( '+1 day' , strtotime ( $_POST['shown_date2']) ) )) : date('Y-m-d', strtotime('+1 day'));
                              

                              
                              
                              ?>

                           </div>
                           

                            <br>

                              
                            <div class="card">
                            <div class="card-header">
                                <h5>
                                  <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Attendance List</a>
                                </h5>
                                <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addDTR" ><i class="fa fa-plus"></i>New</button>
                                                <!--<h5>Attendance List </h5>-->
                                                <!--<div class="card-header-right">-->
                                                <!--    <ul class="list-unstyled card-option">-->
                                                <!--        <li><i class="fa fa fa-wrench open-card-option"></i></li>-->
                                                <!--        <li><i class="fa fa-window-maximize full-card"></i></li>-->
                                                <!--        <li><i class="fa fa-refresh reload-card"></i></li>-->
                                                <!--    </ul>-->
                                                <!--</div>-->

                                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">

                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Employee Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Time-in</th>
                                        <th>Time-out</th>
                                        <th>Duration</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    <?php
                                        $sql = "SELECT a.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,a.id as aid,e.id as eid FROM attendance a left join employees e on a.employee_id=e.employee_id 
                                        inner JOIN department_category dc ON dc.id = e.department_id WHERE time_in > '$today' AND time_in < '$tom2' order by date_created asc";
                                        $query = $conn->query($sql);
                                        while($row = $query->fetch_assoc()){
                                          $eid= $row['eid'];
                                          $sql2="SELECT * from employees e inner JOIN department_category dc ON dc.id = e.department_id inner JOIN position p ON p.id = e.position_id where e.id='$eid' ";
                                          $query2= $conn->query($sql2);
                                          $row2 = $query2->fetch_assoc();
                                        ?>
                                            <tr>
                                              <td><?php echo date('M d, Y',strtotime($row['time_in']));   ?></td>
                                              <td><?php echo $row['name']; ?></td>
                                              <td><?php echo $row2['title']; ?></td>
                                              <td><?php echo $row2['description']; ?></td>
                                              <td><?php echo date('H:m:s',strtotime($row['time_in']));?></td>
                                              <td><?php if($row['time_out']!=null){echo date('H:m:s',strtotime($row['time_out']));}?></td>
                                              <td><?php
                                                  $t1 = strtotime( $row['time_in'] );
                                                  $t2 = strtotime( $row['time_out'] );
                                                  $diff = $t2 - $t1;
                                                  $hours = $diff / 3600 ;
                                                  if($row['time_out']==null){$hours=0;}
                                               echo round($hours,2) 
                                               ?></td>

                                              <td class="text-center">
                                                      <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                                  Action
                                                        </button>
                                                        <div class="dropdown-menu" style="">
                                                          <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['aid'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                          <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['aid'] ?>"><i class="fa fa-trash"></i>Delete</a>
                                                        </div>
                                            </td>
                                            </tr>
                                      <?php }?>
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

    <?php include 'includes/dtr_modal.php'; ?>

    <?php include 'includes/scripts.php'; ?>

    

<script>


$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#editDTR').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteDTR').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

   $('#shown_date').change(function(){
      $('#date_form').submit();
   });
   $('#shown_date2').change(function(){
      $('#date_form').submit();
   });


});


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/dtr_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $('#DTR_title').html("Delete Attendance Record");
      $('#DTR_id').val(response.aid);
      //edit
      $('#edit_id').val(response.aid);
      $('#name_edit').val(response.name);
      $('#timein').val(response.time_in.replace(/ /g,"T").substr(0,16)); 
      $('#timeout').val(response.time_out.replace(/ /g,"T").substr(0,16)); 
    }
  });
}



$(document).ready(function() {

  
  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
    $('#table1').DataTable();
  }//**end**

  //select all
  $('#globalcheck').click(function(e){
    if(this.checked) {
      $(':checkbox').each(function() {
        this.checked = true;                        
      });
    }else {
      $(':checkbox').each(function() {
        this.checked = false;                       
      });
    }
  });


  

} );
</script>

</body>
</html>

