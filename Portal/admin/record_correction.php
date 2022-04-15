<?php 
  $title ="Daily Time Records";
  require_once '../includes/path.php';
  require_once 'includes/session.php';
  require_once 'includes/header.php';
?>

<body>
  <?php include 'includes/preloader.php'; ?>
  <div id="pcoded" class="pcoded">
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
                      <h5 class="m-b-10">Time Record Correction</h5>
                      <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="breadcrumb-title">
                      <li class="breadcrumb-item">
                        <a href="index.php"> <i class="fa fa-home"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="#!">Daily Time Records</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="#!">Time Record Correction</a>
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
                        <?php include 'RC_request.php'; ?>  
                      </div>
                      <div class="tab-pane " id="CAapp" role="tabpanel">
                        <?php include 'RC_approved.php'; ?>   
                      </div>
                      <div class="tab-pane " id="CArej" role="tabpanel">
                        <?php include 'RC_rejected.php'; ?>   
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

  <?php include 'includes/RC_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>

    
<script>

function RC_row(id){
  $.ajax({
    type: 'POST',
    url: 'function/RC_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //review
      $('#RC_id').val(response.acid);
      $('#A_id').val(response.attendance_id);
      $('#timein').val("");
      $('#timeout').val("");
      $('#timein2').val("");
      $('#timeout2').val("");

      $('#timein').val(response.tin.replace(/ /g,"T").substr(0,16)); 
      $('#timeout').val(response.tout.replace(/ /g,"T").substr(0,16)); 
      $('#timein2').val(response.req_in.replace(/ /g,"T").substr(0,16)); 
      $('#timeout2').val(response.req_out.replace(/ /g,"T").substr(0,16));
      $('#RC_reason').val(response.reason);

      //view
      $('#timeina').val(response.tin.replace(/ /g,"T").substr(0,16)); 
      $('#timeouta').val(response.tout.replace(/ /g,"T").substr(0,16)); 
      $('#timeinb').val(response.req_in.replace(/ /g,"T").substr(0,16)); 
      $('#timeoutb').val(response.req_out.replace(/ /g,"T").substr(0,16));
      $('#RC_reasonc').val(response.reason);

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
  
  //review request
  $(document).on('click','.evaluate',function(e){
    e.preventDefault();
    $('#review_req').modal('show');
    var id = $(this).data('id');
    RC_row(id);
  });
  
  $(document).on('click','.view',function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    RC_row(id);
  });

});
</script>

</body>
</html>


