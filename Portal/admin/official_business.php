<?php 
  $title ="Official Business";
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
                      <h5 class="m-b-10">Official Business</h5>
                      <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <ul class="breadcrumb-title">
                      <li class="breadcrumb-item">
                          <a href="index.php"> <i class="fa fa-home"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="#!">Employee</a>
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
              <?php include_once 'includes/session_alert.php'; ?>
              <div class="card">
                <div class="card-block">
                  <div class="col-xl-12 col-xl-6">
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
                        <?php include 'OB_request.php'; ?>  
                      </div>
                      <div class="tab-pane " id="CAapp" role="tabpanel">
                          <?php include 'OB_approved.php'; ?>   
                      </div>
                      <div class="tab-pane " id="CArej" role="tabpanel">
                          <?php include 'OB_rejected.php'; ?>   
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

  <?php require_once 'includes/OB_modal.php'; ?>
  <?php require_once 'includes/scripts.php'; ?>

    
<script>


  function OT_row(id){
    $.ajax({
      type: 'POST',
      url: 'function/OB_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        //review
        $('#OT_id').val(response.oids);
        $('#name').val(response.name); 
        $('#date').val(response.date); 
        $('#startTime').val(response.start); 
        $('#endTime').val(response.end); 
        $('#OT_reason').val(response.details);
        //view
        $('#name1').val(response.name); 
        $('#date1').val(response.date); 
        $('#startTime1').val(response.start); 
        $('#endTime1').val(response.end); 
        $('#OT_reason1').val(response.details);
        $('#evalby').val(response.evaluated_by);
        $('#type1').val(response.cash);
        $('#note1').val(response.notes);
          
        if (response.status==2) {
          $('#ottype1').hide();
        }else{
          $('#ottype1').show();
        }   
      }
    });
  }



  $(document).ready(function() {

     //review request
    $(document).on('click','.evaluate',function(e){
      e.preventDefault();
      $('#review_req').modal('show');
      var id = $(this).data('id');
      OT_row(id);
    });

    $(document).on('click','.view',function(e){
      e.preventDefault();
      $('#view').modal('show');
      var id = $(this).data('id');
      OT_row(id);
    });


    $(document).on('change','#Status',function(){
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

     // to avoid the re-initialization of datatable
    if ( ! $.fn.DataTable.isDataTable( '#table1' ) && ! $.fn.DataTable.isDataTable( '#table2' ) && ! $.fn.DataTable.isDataTable( '#table3' ) ) {
      $('#table1').DataTable();
      $('#table2').DataTable();
      $('#table3').DataTable();

    }//**end**

    // ensure that the other tab pane is hidden when the other one is shown :)
    $(document).on('shown.bs.tab','.nav-tabs a',function(e){
      var activeTab = $(this).attr('href');
      $(".tab-pane").hide();
      $(activeTab).show();
    });//**end**
    

  });
</script>

</body>
</html>


