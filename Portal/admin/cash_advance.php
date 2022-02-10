<?php 
  $title ="Cash Advance";
  require_once '../includes/path.php';
  require_once 'includes/session.php';
  require_once 'includes/header.php';
?>

<body>
  <?php include_once 'includes/preloader.php'; ?>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper">         
    <?php require_once 'includes/navbar.php'?>
    <div class="pcoded-main-container">
      <div class="pcoded-wrapper">
        <?php require_once 'includes/sidebar.php'?>
        <div class="pcoded-content">
          <!-- Page-header start -->
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Cash Advance</h5>
                    <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                      <a href="index.php"> <i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Employee</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Cash Advance</a>
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
            <div class="card">
              <div class="card-block">
                <div class="col-xl-12 col-xl-6">
                  <div class="sub-title"></div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#CAreq" role="tab">Pending</a>
                        <div class="slide"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#CAapp" role="tab">Approved</a>
                        <div class="slide"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#CArej" role="tab">Rejected</a>
                        <div class="slide"></div>
                      </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="CAreq" role="tabpanel">
                        <?php require_once 'CA_request.php'; ?>  
                      </div>
                      <div class="tab-pane " id="CAapp" role="tabpanel">
                        <?php require_once 'CA_approved.php'; ?>   
                      </div>
                      <div class="tab-pane " id="CArej" role="tabpanel">
                        <?php require_once 'CA_rejected.php'; ?>   
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
  </div>


  <?php require_once 'includes/CA_modal.php'; ?>
  <?php require_once 'includes/scripts.php'; ?>

    
<script>



function CA_row(id){
  $.ajax({
    type: 'POST',
    url: '/Portal/employee/function/CA_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //edit
      $('#CA_id').val(response.id);
      $('.edit_CA_date').val(new Date(response.req_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
      $('.edit_CA_type').val(response.ca_type);
      $('.edit_CA_amount').val(response.amount);
      $('.edit_CA_reason').val(response.ca_reason);
      $('.edit_CA_notes').val(response.notes);
    }
  });
}




$(document).ready(function() {

  //review request
  $(document).on('click','.review_req',function(e){
    e.preventDefault();
    $('#review_req').modal('show');
    var id = $(this).data('id');
    CA_row(id);
  });

  $(document).on('click','.view_req',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    CA_row(id);
    $('#note_section').addClass('d-none');
  });

  $(document).on('click','.view_desc',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    CA_row(id);
    $('#note_section').removeClass('d-none');
  });


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
  

});
</script>

</body>
</html>


