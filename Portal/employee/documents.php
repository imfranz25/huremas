<?php 
  $title ="Document Request";
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
                    <h5 class="m-b-10">Document Request</h5>
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
                      <a href="documents.php">Document Request</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Page-header end -->

          <div class="pcoded-inner-content">
            <?php
              #SESSION ALERTS
              include_once '../admin/includes/session_alert.php';

              $id = $user['employee_id'];
              $sql = "SELECT 
                  SUM(CASE WHEN (request_by = 'employee' AND request_status=0) THEN 1 ELSE 0 END) AS my_request_pending, 
                  SUM(CASE WHEN (request_by = 'employee' AND request_status=1) THEN 1 ELSE 0 END) AS my_request_replied, 
                  SUM(CASE WHEN (request_by = 'employee' AND request_status=2) THEN 1 ELSE 0 END) AS my_request_rejected, 
                  SUM(CASE WHEN (request_by = 'admin' AND request_status=0) THEN 1 ELSE 0 END) AS hr_request_pending,
                  SUM(CASE WHEN (request_by = 'admin' AND request_status=3) THEN 1 ELSE 0 END) AS hr_request_validated,
                  SUM(CASE WHEN (request_by = 'admin' AND request_status=2) THEN 1 ELSE 0 END) AS hr_request_rejected
                  FROM document_request WHERE employee_id='$id' ";
              $query=$conn->query($sql);
              $row_count=$query->fetch_assoc();
              //employee status counts
              $emp_pending = $row_count['my_request_pending'];
              $emp_replied = $row_count['my_request_replied'];
              $emp_rejected = $row_count['my_request_rejected'];
              //hr status counts
              $hr_pending = $row_count['hr_request_pending'];
              $hr_validated = $row_count['hr_request_validated'];
              $hr_rejected = $row_count['hr_request_rejected'];
            ?>

            <!-- Main-body start -->
            <div class="card">
              <div class="card-block">
                <div class="col-xl-12 col-xl-6">
                  <div class="sub-title"></div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs md-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#myreq" role="tab" >My Request<br>
                        <div class="mx-2 px-2 f-12 mt-2 badge badge-warning ">
                          <?php echo $emp_pending.' Pending'; ?>
                        </div> 
                        <div class="mx-2 px-2 f-12 mt-2 badge badge-success">
                          <?php echo $emp_replied.' Replied'; ?>
                        </div> 
                        <div class="mx-2 px-2 f-12 mt-2 badge badge-danger">
                          <?php echo $emp_rejected.' Rejected'; ?>
                        </div>
                      </a>
                      <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#hrreq" role="tab">HR's Request<br>
                        <div class="mx-2 px-2 f-12 mt-2 badge badge-warning ">
                          <?php echo $hr_pending.' Pending'; ?>
                        </div>
                        <div class="mx-2 px-2 f-12 mt-2 badge badge-success">
                          <?php echo $hr_validated.' Validated'; ?>
                        </div>
                        <div class="mx-2 px-2 f-12 mt-2 badge badge-danger">
                          <?php echo $hr_rejected.' Rejected'; ?>
                        </div>
                      </a>
                      <div class="slide"></div>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="myreq" role="tabpanel">
                      <?php require_once 'my_request.php'; ?>  
                    </div>
                    <div class="tab-pane" id="hrreq" role="tabpanel">
                      <?php require_once 'hr_request.php'; ?>   
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

  <?php require_once('includes/document_request_modal.php'); ?>
  <?php require_once("../admin/includes/scripts.php"); ?>

<script>

//SET STATUS
function set_req_status(status){
  if (status==0) {
    status ='Pending';
  }else if (status==1) {
    status ='Document sent';
  }else if (status==2) {
    status ='Rejected';
  }else{
    status ='Validated';
  }
  return status;
}

// GET REQUEST INFOS
function get_request(reference_id){
  $('#review_form')[0].reset();
  $.ajax({
    type: 'POST',
    url: '/Portal/admin/function/document_request_row.php',
    dataType: 'json',
    data: {request_id:reference_id},
    success: function(response){
      //delete
      $('.req_name_cancel').html(response.request_name);
      $('.req_date_cancel').html('Date Requested : '+(new Date(response.request_date)).toLocaleString('en-us',{month:'long',year:'numeric',day:'numeric'}));
      //view
      $('.view_request_date').val((new Date(response.request_date)).toLocaleString('en-us',{month:'long',year:'numeric',day:'numeric'}));
      $('.view_request_name').val(response.request_name);
      $('.view_request_details').val(response.request_note);
      $('.request_id').val(reference_id);
      //review
      let status =set_req_status(response.request_status);
      $('.view_request_status').val(status);
      $('#cancel_edit').data('id',reference_id);
      $('.view_request_comment').val(response.request_comment);

      //properties
      $('.view_request_comment').attr('readonly',true);
      $('.view_request_file').removeClass('d-none');
      $('.request_file_upload').addClass('d-none');
      $('.edit_reply').addClass('d-none');
      $('.edit_btn').removeClass('d-none');
      $('.edit_btn').data('status',response.request_status);
      $('#file_info_change').addClass('d-none');
      
      if (response.request_status==0) {
        $('.view_request_file').html('No uploaded file');
        $('.view_request_file').attr('href','#');
        $('.view_request_file').attr('target','');
        $('.request_file_upload').attr('required',true);
      }else{
        $('.request_file_upload').attr('required',false);
        $('.view_request_file').attr('target','_blank');
        $('.view_request_file').html(response.request_file);
        $('.view_request_file').attr('href','/Documents/request/?reference_id='+response.file_hash);
        if (response.request_status==3) {
          $('.validated_reply').addClass('d-none');  
        }
      }
    }
  });
}

$(document).ready(function() {

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) && ! $.fn.DataTable.isDataTable( '#table2' ) && ! $.fn.DataTable.isDataTable( '#table3' ) ) {
    $('#table1').DataTable();
    $('#table2').DataTable();
  }//**end**

  // ensure that the other tab pane is hidden when the other one is shown :)
  $('.nav-tabs a').on('shown.bs.tab', function(){
    var activeTab = $(this).attr('href');
    $(".tab-pane").hide();
    $(activeTab).show();
  });//**end**

  //EDIT REQUEST BTN
 $(document).on('click','.edit_req', function(e){
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $("#emp_request_edit").modal('show');
  });//**end**

 //CANCEL REQUEST
 $(document).on('click','.cancel_req', function(e){
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $("#cancelreq").modal('show');
  });//**end**

 //Review REQUEST
 $(document).on('click','.review_req', function(e){
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $("#emp_request_review").modal('show');
  });//**end**

 //Review REQUEST ADMIN
 $(document).on('click','.review_req_admin', function(e){
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $("#admin_request_review").modal('show');
  });//**end**

 //EDIT BTN -> SHOW SAVE AND CANCEL
 $(document).on('click','.edit_btn', function(e){
    e.preventDefault();
    let status = $(this).data('status');
    if (status==0) {
        $('#file_info_change').addClass('d-none');
    }else{
        $('#file_info_change').removeClass('d-none');
    }
    $('.edit_reply').removeClass('d-none');
    $(this).addClass('d-none');
    $('.view_request_comment').attr('readonly',false);
    $('.view_request_file').addClass('d-none');
    $('.request_file_upload').removeClass('d-none');
  });//**end**

 //CANCEL EDIT
 $(document).on('click','#cancel_edit', function(e){
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
  });//**end**
  
});

</script>

</body>
</html>


