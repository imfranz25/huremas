<?php 
$title ="Overtime";
require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/header.php");

?>
  <body>
  <?php require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/preloader.php"); ?>
  
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
                                          <h5 class="m-b-10">Overtime</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="index.php">Home</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="overtime.php">Overtime</a>
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
                          <div class="card-block">
                            



                            <div class="card-header">


                              <h5>
                                <a type="button" class="btn btn-default">
                                  Overtime List
                                </a>
                              </h5>
                              <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addOT">
                                <i class="fa fa-plus"></i>New
                              </button>
                                         
                                
                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th width="5%">Date</th>
                                        <th width="5%">Time Start</th>
                                        <th width="5%">Time End</th>
                                        <th width="5%">Number of Hours</th>
                                        <th>Reason</th>
                                        <th width="5%">Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $id = $user['employee_id'];
                                            $sql = "SELECT orec.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,orec.id as oids FROM overtime_request orec LEFT JOIN employees e ON e.employee_id=orec.employee_id WHERE orec.employee_id = '$id' ORDER BY orec.date DESC ";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                            ?>
                                                <tr>

                                                    <td><?php echo date('M d, Y',strtotime($row['date'])); ?></td>
                                                    <td><?php echo date('h:i A',strtotime($row['start'])); ?></td>
                                                    <td><?php echo date('h:i A',strtotime($row['end'])); ?></td>
                                                    <td><?php
                                                  $t1 = strtotime( $row['start'] );
                                                  $t2 = strtotime( $row['end'] );
                                                  $diff = $t2 - $t1;
                                                  $hours = $diff / 3600 ;
                                               echo round($hours,2) ?></td>
                                                    <td><?php echo $row['reason']; ?></td>
                                                    <td><?php if($row['status']=='0'){?>
                                                    	<span class='badge badge-info'>Pending</span>
                                                    <?php }else if($row['status']=='1'){?>
                                                    	<span class='badge badge-success'>Approved</span>
                                                    <?php }else{?>
                                                    	<span class='badge badge-danger'>Rejected</span>
                                                    <?php } ?>
                                                    </td>

                                                    <td class="text-center">
                                                      <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                                  Action
                                                        </button>
                                                        
                                                        <div class="dropdown-menu" style="">
                                                        	<?php if($row['status']=='0'): ?>
                                                          <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['oids'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                          <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['oids'] ?>"><i class="fa fa-trash"></i>Delete</a>
                                                          <?php endif; ?>

                                                          <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item view" href="javascript:void(0)" data-id="<?php echo $row['oids'] ?>"><i class="fa fa-eye"></i>View</a>
                                                        </div>
                                            </td>
                                                </tr>

                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                               





                          </div>
                        </div>     


                             <!-- Main-body end -->
                  </div>
              </div>
        </div>
    </div>
   

    <?php require_once 'includes/overtime_modal.php'; ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/alert_modal.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/scripts.php"); ?>

    
    <script>
$(function(){


  $('.edit').click(function(e){
    e.preventDefault();
    $('#editOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

   $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

   $('.view').click(function(e){
    e.preventDefault();
    $('#viewOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });


});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/overtime_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#otid').val(response.otrid);
      $('#reason').val(response.reason);
      $('#date').val(response.date);
      $('#start').val(response.start);
      $('#end').val(response.end);
      //delete
      $('#overtime_id').val(response.otrid);

      //view
      $('#date_view').val(response.date);
      $('#start_view').val(response.start);
      $('#end_view').val(response.end);
      $('#reason_view').val(response.reason);
      

      var stats="";
      var ott="";

       if(response.status==0){
            stats="<span class='badge badge-info'>Pending</span>";
            ott="";
       }else if(response.status==1){
            stats="<span class='badge badge-success'>Approved</span>";
            ott=response.otname+" ("+response.otrx+"%)";
      }else{
            stats="<span class='badge badge-danger'>Rejected</span>";
            ott="";
      }

      $('#eval_by').val("None");
      $('#ot_type').val("None");
      $('#notes_view').val("None");

      $('#status_view').html(stats);
      $('#eval_by').val(response.evaluated_by);
      $('#ot_type').val(ott);
      $('#notes_view').val(response.notes);

}
  });
}



$(document).ready(function() {

  // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
  $('body').on('hidden.bs.modal', function () {
    if($('.modal.show').length > 0){
      $('body').addClass('modal-open');
    }
  });

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' )) {
    $('#table1').dataTable( {
      "order": [],
    });
  }//**end**



});




</script>

</body>
</html>


