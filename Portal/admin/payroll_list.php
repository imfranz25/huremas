<?php 
  $title ="Payroll";
  require_once '../includes/path.php';
  require_once 'includes/session.php';
  require_once 'includes/header.php';
?>

<body>
  <?php include_once 'includes/preloader.php'; ?>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">         
        <?php include 'includes/navbar.php'?>
          <div class="pcoded-main-container">
           <div class="pcoded-wrapper">
            <?php include 'includes/sidebar.php'?>
              <div class="pcoded-content">
                <!-- Page-header start -->
                <div class="page-header">
                  <div class="page-block">
                    <div class="row align-items-center">
                      <div class="col-md-8">
                        <div class="page-header-title">
                          <h5 class="m-b-10">Payroll</h5>
                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <ul class="breadcrumb-title">
                          <li class="breadcrumb-item">
                            <a href="index.php"> <i class="fa fa-home"></i> </a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="payroll_list.php">Payroll</a>
                          </li>
                        </ul>
                      </div>
                  </div>
                </div>
              </div>
              <!-- Page-header end -->

              <div class="pcoded-inner-content">
                <?php include_once 'includes/session_alert.php'; ?>   
                <!-- Main-body start -->
                 <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i>New Payroll Coverage</button>
                
                <div class="card">
                  <div class="card-header">
                    <h5>Payroll Coverage List</h5>
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
                            <th>Pay Code</th>
                            <th>Pay Period Start Date</th>
                            <th>Pay Period End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = "SELECT * FROM payroll_coverage_table";
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                          ?>
                          <tr>
                            <!--Content-->

                            <td><?php echo $row['pay_code']; ?></td>
                            <td><?php echo $row['Sdate']; ?></td>
                            <td><?php echo $row['Edate']; ?></td>
                            <td>
                              <?php 
                                if($row['payroll_status']=='0'){?>
                                  <span class='badge badge-info'>On-going</span>
                              <?php }else{?>
                                  <span class='badge badge-success'>Finished</span>
                              <?php } ?>
                            </td>
							              <td class="text-center">
				                      <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
				                        Action
				                      </button>
				                      <div class="dropdown-menu" style="">
				                        <div class="dropdown-divider"></div>
			                          <a class="dropdown-item open" href="javascript:void(0)" data-id="<?php echo $row['pay_code'] ?>">
                                  <i class="fa fa-eye"></i>Open
                                </a>
			                          <div class="dropdown-divider"></div>
                                <?php if($row['payroll_status']==0): ?>
			                          <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['pay_code'] ?>">
                                  <i class="fa fa-edit"></i>Edit
                                </a>
			                          <div class="dropdown-divider"></div>
			                          <a class="dropdown-item delete" href="javascript:void(0)" data-id="<?php echo $row['pay_code'] ?>">
                                  <i class="fa fa-trash"></i>Delete
                                </a>
                                <?php endif;?>
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
             <!-- Main-body end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'includes/payroll_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>

    
<script>

function OT_row(id){
  $.ajax({
    type: 'POST',
    url: 'function/pc_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $('#pcode').val(response.pay_code);
      $('#name').html(response.pay_code); 
      //edit
      $('#pcc').val(response.pay_code); 
      $('#Sdate').val(response.Sdate); 
      $('#Edate').val(response.Edate); 
      $('#pDate').val(response.Pdate); 
    }
  });
}

$(document).ready(function() {

   // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) && ! $.fn.DataTable.isDataTable( '#table2' ) && ! $.fn.DataTable.isDataTable( '#table3' ) ) {
    $('#table1').DataTable();
    $('#table2').DataTable();
    $('#table3').DataTable();
  }//**end**

  // ensure that the other tab pane is hidden when the other one is shown :)
  $('.nav-tabs a').on('shown.bs.tab', function(){
    var activeTab = $(this).attr('href');
    $(".tab-pane").hide();
    $(activeTab).show();
  });//**end**
  

  $(document).on('change','#Status', function(){
    var id = $(this).val();
    if(id=='1'){
      $('#ottype').show();
      $('#notes').show();
    }else if(id=='2'){
      $('#ottype').hide();
      $('#notes').show();
    }
    else{
      $('#ottype').hide();
      $('#notes').hide();
    }
  });

  //review request
  $(document).on('click','.open', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    window.location.assign("payroll_summary.php?pc="+id); 
  });

  $(document).on('click','.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    OT_row(id);
  });

  $(document).on('click','.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    OT_row(id);
  });

});
</script>

</body>
</html>


