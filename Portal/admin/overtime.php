<?php 
  $title ="Overtime";
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
                      <a href="index.php"> <i class="fa fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Employee</a>
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
            <?php include_once 'includes/session_alert.php'; ?>   
            <!-- Main-body start -->
            <a href="overtime_category.php">
              <button type="button" class="btn btn-mat waves-effect waves-light btn-success" >
                <i class="fa fa-folder-open-o"></i>Overtime Category
              </button>
            </a>
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
                      <br>
                      <?php include 'OT_request.php'; ?>  
                    </div>
                    <div class="tab-pane " id="CAapp" role="tabpanel">
                      <br>
                      <?php include 'OT_approved.php'; ?>   
                    </div>
                    <div class="tab-pane " id="CArej" role="tabpanel">
                      <br>
                      <?php include 'OT_rejected.php'; ?>   
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

  <?php include 'includes/OT_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>

    
<script>


function OT_row(id){
  $.ajax({
    type: 'POST',
    url: 'function/OT_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //review
      $('#OT_id').val(response.oids);
      $('#name').val(response.name); 
      $('#date').val(response.date); 
      $('#startTime').val(response.start); 
      $('#endTime').val(response.end); 
      $('#OT_reason').val(response.reason);

      var timeStart = new Date("01/01/2021 " + response.start).getHours();
      var timeEnd = new Date("01/01/2021 " + response.end).getHours();
      var hourDiff = timeEnd - timeStart;   
      $('#total').val(Math.abs(Math.round(hourDiff))); 
      $('#total1').val(Math.abs(Math.round(hourDiff))); 

      //view
      $('#name1').val(response.name); 
      $('#date1').val(response.date); 
      $('#startTime1').val(response.start); 
      $('#endTime1').val(response.end); 
      $('#OT_reason1').val(response.reason);
      $('#evalby').val(response.evaluated_by);

      if (response.status==2) {
        $('#ottype1').hide();
      }else{
        $('#ottype1').show();
      }

      $('#type1').val(response.otname+" - ("+response.ors+"%)");
      $('#note1').val(response.notes);
          

      //view



      
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


