<?php 
  $title ="Official Business";
  require_once '../includes/path.php';
  require_once("../admin/includes/session.php");
  require_once("../admin/includes/header.php");
?>

<body>
  <?php include_once("../admin/includes/preloader.php");  ?>
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
                  <h5 class="m-b-10">Official Business</h5>
                  <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                </div>
              </div>
              <div class="col-md-4">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="index.php"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="official_business.php">Official Business</a>
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
          <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addOT">
            <i class="fa fa-plus"></i>New
          </button>
          <div class="card">
            <div class="card-block">
              <div class="card-header">
                <h5>Official Business List</h5>
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
                      <thead>
                      <tr>
                        <th width="5%">Date</th>
                        <th width="5%">Time Start</th>
                        <th width="5%">Time End</th>
                        <th>Details</th>
                        <th width="5%">Status</th>
                        <th width="10%">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          $id = $user['employee_id'];
                          $sql = "SELECT *,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,a.id as oids FROM allowance a LEFT JOIN employees e ON e.employee_id=a.employee_id WHERE a.employee_id = '$id' ORDER BY a.date DESC ";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                        ?>
                        <tr>
                          <td>
                            <?php echo date('M d, Y',strtotime($row['date'])); ?>
                          </td>
                          <td>
                            <?php echo date('h:i A',strtotime($row['start'])); ?>
                          </td>
                          <td>
                            <?php echo date('h:i A',strtotime($row['end'])); ?>
                          </td>
                          <td><?php echo $row['details']; ?></td>
                          <td>
                            <?php if($row['status']=='0'){?>
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
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['oids'] ?>">
                                  <i class="fa fa-edit"></i>Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item delete" href="javascript:void(0)" data-id="<?php echo $row['oids'] ?>">
                                  <i class="fa fa-trash"></i>Delete
                                </a>
                              <?php endif; ?>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item view" href="javascript:void(0)" data-id="<?php echo $row['oids'] ?>">
                                <i class="fa fa-eye"></i>View
                              </a>
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
     
  <?php require_once 'includes/ob_modal.php'; ?>
  <?php require_once("../admin/includes/alert_modal.php"); ?>
  <?php require_once("../admin/includes/scripts.php"); ?>

<script>


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/ob_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#otid').val(response.otrid);
      $('#reason').val(response.details);
      $('#date').val(response.date);
      $('#start').val(response.start);
      $('#end').val(response.end);
      //delete
      $('#overtime_id').val(response.otrid);
      //view
      $('#date_view').val(response.date);
      $('#start_view').val(response.start);
      $('#end_view').val(response.end);
      $('#reason_view').val(response.details);
      
      var stats="";
      if(response.status==0){
        stats="<span class='badge badge-info'>Pending</span>";
      }else if(response.status==1){
        stats="<span class='badge badge-success'>Approved</span>";
      }else{
        stats="<span class='badge badge-danger'>Rejected</span>";
      }

      $('#eval_by').val("None");
      $('#ot_type').val("None");
      $('#notes_view').val("None");
      $('#status_view').html(stats);
      $('#eval_by').val(response.evaluated_by);
      $('#ot_type').val(response.cash);
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

  $(document).on('click','.edit',function(e){
    e.preventDefault();
    $('#editOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.delete',function(e){
    e.preventDefault();
    $('#deleteOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.view',function(e){
    e.preventDefault();
    $('#viewOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

</script>

</body>
</html>


