<?php 
  $title ="Event Request";
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
                  <h5 class="m-b-10">Event Request</h5>
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
                    <a href="events.php">Event Request</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Page-header end -->

        <div class="pcoded-inner-content">
          <!-- Main-body start -->
          <div class="card">
            <div class="card-block">
              <?php require_once 'event_request.php'; ?>
            </div>
          </div>
          <!-- Main-body end -->
        </div>
      </div>
    </div>
  </div>

  <?php 
    require_once("includes/CA_modal.php");  
    require_once('includes/event_modal.php');
    require_once("../admin/includes/scripts.php");
  ?>

<script>


function event_request_row(id){
  $.ajax({
    type: 'POST',
    url: 'function/event_request_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      let status = "Pending";
      //edit
      $('.event_reference').val(response.reference_id);
      $('.event_display').html(response.display_image);
      $('.event_display').attr('href','../admin/uploads/events/'+response.display_image);
      $('.event_date').val(response.event_date);
      $('.event_date_text').val((new Date(response.event_date)).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'}));
      $('.event_name').val(response.event_name);
      $('.event_from').val(response.event_from);
      $('.event_to').val(response.event_to);
      $('.event_venue').val(response.event_venue);
      $('.event_details').val(response.details);
      if (response.request_status=='1') {
        status = 'Approved';
      }else if (response.request_status=='2') {
        status = 'Rejected';
      }
      $('.event_status').val(status);
      //delete
      $('#del_events').html(response.event_name);
      $('#del_reference').html('Date Requested : '+(new Date(response.request_date)).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'}));
    }
  });
}

//CHECK FILE MAIN FUNCTION
function check_file(file_input,valid_extension){
  if (file_input.type == "file") {
    //get value and extension
    const file_name = file_input.value;
    const extension = file_name.substr((file_name.lastIndexOf('.') +1));
    if (file_name.length > 0) { //check if there is selected file
      var file_size = file_input.files[0].size/1024/1024; //file size in MB
      if (file_size <= 5){ // Maximum of 5MB Image Upload
        if(!valid_extension.includes(extension)){ // check if extension is valid
          file_input.value = '';
          $('#fullModal').modal('show');
          $('#warn_msg').html('Invalid file format !');
        }
      }else{
        file_input.value = '';
        $('#fullModal').modal('show');
        $('#warn_msg').html('The attachment size exceeds the allowable limit !');
      }
    }
  }
}


//CHECK IF FILE IS VALID (IMAGE)
function check_image(file_input) {
  //valid extension
  const valid_image = ["jpg", "jpeg", "png"];    
  check_file(file_input,valid_image);
  return true;
} 


$(document).ready(function() {

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
    $('#table1').DataTable();
  }//**end**

  //Event Request Properties
  $(document).on('click','.edit',function(e){
    e.preventDefault();
    $('#editRequest').modal('show');
    var id = $(this).data('id');
    event_request_row(id);
  });

  $(document).on('click','.view',function(e){
    e.preventDefault();
    $('#viewRequest').modal('show');
    var id = $(this).data('id');
    event_request_row(id);
  });
  
  $(document).on('click','.delete',function(e){
    e.preventDefault();
    $('#cancelRequest').modal('show');
    var id = $(this).data('id');
    event_request_row(id);
  });
  
});

</script>

</body>
</html>


