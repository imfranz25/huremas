<?php 
  $title ="Events";
  require_once '../includes/path.php';
  require_once 'includes/session.php';
  require_once 'includes/header.php';
?>

<body>
  <?php include_once 'includes/preloader.php'; ?>
  
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
                  <h5 class="m-b-10">Events</h5>
                  <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                </div>
              </div>
              <div class="col-md-4">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                      <a href="index.php"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a href="events.php">Events</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Pcoded Inner Content -->
        <div class="pcoded-inner-content">
          <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
            <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-warning'></i> Note !</h4>
             <label id="warning"></label>
          </div>

          <?php include_once 'includes/session_alert.php'; ?>         

          <?php 

            $rsql = "SELECT COUNT(*) FROM event_request 
                    WHERE request_status = 0";
            $rquery=$conn->query($rsql);
            $row = $rquery->fetch_assoc();

            if ($row['COUNT(*)']==0) {
              $count='';
            }else{
              $count=$row['COUNT(*)'];
            }

          ?>

          <!-- Main-body start -->
          <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addEvents"><i class="fa fa-plus"></i>Add Events</button>
          <button type="button" class="btn btn-mat waves-effect waves-light btn-danger" id="deleteAllEvents"><i class="fa fa-trash"></i>Delete</button>

                        
          <div class="card">
            <div class="card-header">
              <h5>
                <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Event List</a>
              </h5>
              <button type="button" class="btn btn-success m-0 float-right" data-target="#eRequest" data-toggle="modal" >
                <i class="fa fa-exchange"></i>Event Requests
                <?php if ($count!='') { ?>
                  <span class="badge text-light bg-danger mx-1">
                  <?php echo "$count"; ?></span>
                <?php } ?>
              </button>
            </div>

            <div class="box-body">
              <div class="card-block table-border-style" style="min-height: 400px;">
                <div class="table-responsive">
                  <table id="table1" class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                        <th style="max-width: 15px;">
                          <div class="custom-control custom-checkbox m-0 p-0">
                            <input type="checkbox" class="custom-control-input" id="globalcheck" />
                            <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck"></label>
                          </div>
                        </th>
                        <th>Reference ID</th>
                        <th>Event Date</th>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_events">

                      <?php
                        $sql = "SELECT * FROM events";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()):
                      ?>

                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox m-0 p-0">
                            <input type="checkbox" class="custom-control-input" id="n<?php echo $row['reference_id']; ?>" />
                            <label class="custom-control-label d-flex align-items-center text-center" for="n<?php echo $row['reference_id']; ?>"></label>
                          </div>  
                        </td>
                        <td><?php echo $row['reference_id']; ?></td>
                        <td><?php echo (new Datetime($row['event_date']))->format('F d, Y'); ?></td>
                        <td><?php echo $row['event_name']; ?></td>
                        <td><?php echo (new Datetime($row['event_from']))->format('h:i a').' - '.(new Datetime($row['event_to']))->format('h:i a'); ?></td>
                        <td><?php echo $row['event_venue']; ?></td>
                        <td>
                          <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                          </button>
                          <div class="dropdown-menu" style="">
                            <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-trash"></i>Delete</a>
                          </div>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- Box Body End -->
          </div>
          <!-- Card End -->
        </div>
        <!-- Pcoded Inner Content End-->
      </div>
    </div>
  </div>



  <?php require_once 'includes/events_modal.php'; ?>
  <?php require_once 'includes/alert_modal.php'; ?>
  <?php require_once 'includes/scripts.php'; ?>


  <script>

  function getRequest(id){
    $.ajax({
      type: 'POST',
      url: 'function/event_request_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        //review
        $('.ereq_id').val(response.reference_id);
        $('.event_date_text').val((new Date(response.event_date)).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'}));
        $('.event_display').html(response.display_image);
        $('.event_display').attr('href','<?php echo $global_link; ?>/Portal/admin/uploads/events/'+response.display_image);
        $('.event_name').val(response.event_name);
        $('.event_from').val(response.event_from);
        $('.event_to').val(response.event_to);
        $('.event_venue').val(response.event_venue);
        $('.event_details').val(response.details);
      }
    });
  }



  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'function/events_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        //delete
        $("#del_reference").removeClass('d-none');
        $('#del_events').html(response.event_name);
        $('#del_reference').html('Date Created : '+ (new Date(response.event_date)).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
        //edit
        $('.reference_id').val(response.reference_id);
        $('.event_date').val(response.event_date);
        $('.event_date').attr('min',response.event_date);
        $('.event_image').html(response.display_image);
        $('.event_image').attr('href','<?php echo $global_link; ?>/Portal/admin/uploads/events/'+response.display_image);
        $('.event_name').val(response.event_name);
        $('.event_timefrom').val(response.event_from);
        $('.event_timeto').attr('min',response.event_from);
        $('.event_timeto').val(response.event_to);
        $('.event_venue').val(response.event_venue);
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
    if ( ! $.fn.DataTable.isDataTable( '#table1' ) && 
          ! $.fn.DataTable.isDataTable( '#table2' ) && 
          ! $.fn.DataTable.isDataTable( '#table3' )&& 
          ! $.fn.DataTable.isDataTable( '#table4' ) ) {
      $('#table1').DataTable();
      $('#table2').DataTable();
      $('#table3').DataTable();
      $('#table4').DataTable();
    }//**end**

    $(document).on('click','.edit',function(e){
      e.preventDefault();
      $('#editEvents').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click','.delete',function(e){
      e.preventDefault();
      $('#eventsDelete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click','.review_req',function(e){
      e.preventDefault();
      $('#reviewRequest').modal('show');
      var id = $(this).data('id');
      getRequest(id);
    });

    $(document).on('click','.view_req',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRequest(id);
    });

    // ensure that the other tab pane is hidden when the other one is shown :)
    $(document).on('shown.bs.tab','.nav-tabs a', function(){
      var activeTab = $(this).attr('href');
      $(".tab-pane").hide();
      $(activeTab).show();
    });//**end**

    //DATA HIDE > ALERT
    $(document).on("click","[data-hide]", function(){
      $("#showdanger").attr('hidden',true);
    });

    //select all
    $(document).on("click","#globalcheck", function(e){
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

    //SET TO(TIME) MIN
    $(document).on("click",".event_from", function(e){
      $('.event_to').attr('min',$(this).val());
    });

    //delete all checked checkbox :)
    $(document).on("click","#deleteAllEvents", function(e){
      //select all checked checkbox
      var ids = $("#tbody_events input:checkbox:checked").map(function(){
        return $(this).attr("id").replace("n","");
      }).get();
      if (ids.length){
        $.ajax({
          type: 'POST',
          url: 'function/events_row.php',
          data: {ids:ids},
          dataType: 'json',
          success: function(response){
            $("#eventsDelete").modal('show');
            $(".reference_id").val(ids);
            $("#del_reference").html('');
            $("#del_reference").addClass('d-none');
            $("#del_events").html((response.length <= 1) ? response.join(", ") : response.slice(0, -1).join(", ")+", and "+response[response.length-1]); 
          }
        });
      }else{
        $("#showdanger").removeAttr("hidden");
        $("#warning").html("Please select events record first !");
      }
    });
  });

  </script>

</body>
</html>




