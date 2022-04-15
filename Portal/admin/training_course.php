<?php 
  $title ="Training Course";
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
                          <h5 class="m-b-10">Training Courses</h5>
                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <ul class="breadcrumb-title">
                          <li class="breadcrumb-item">
                            <a href="index.php"> <i class="fa fa-home"></i></a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="training_course.php">Training</a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="training_course.php">Courses</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Page-header end -->

                <div class="pcoded-inner-content">
                  <!-- ALERT -->
                  <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
                    <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
                    <h4>
                      <i class='icon fa fa-warning'></i> Note !
                    </h4>
                    <label id="warning"></label>
                  </div>
                  <!-- SESSION ALERTS -->
                  <?php include_once 'includes/session_alert.php'; ?>   

                  <div class="card">
                    <div class="card-header">
                      <h5>
                        <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Course List</a>
                      </h5>
                      <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#courseNew" id="btncourse">
                        <i class="fa fa-plus"></i>Add Course
                      </button>
                    </div>
                  <div class="box-body">
                    <div class="card-block table-border-style" style="min-height: 400px;">
                      <div class="table-responsive">
                        <table id="table1" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Course Code</th>
                              <th>Course Title</th>
                              <th>Details</th>
                              <th style="max-width: 60px;">Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody_course">
                            <?php
                              $sql = "SELECT * FROM training_course";
                              $query = $conn->query($sql);
                              while($row = $query->fetch_assoc()) :
                            ?>
                            <tr>
                              <td><?php echo $row['course_code']; ?></td>
                              <td><?php echo $row['course_title']; ?></td>
                              <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                                <a href='#courseView' data-toggle='modal' class='pull-right desc' data-id='<?php echo $row['id']; ?>'><span class='fa fa-eye ml-3'></span></a>
                                <?php echo $row['course_details']; ?>
                              </td>
                              <td>
                                <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                </button>
                                <div class="dropdown-menu" style="">
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                                    <i class="fa fa-edit"></i>Edit
                                  </a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">
                                    <i class="fa fa-trash"></i>Delete
                                  </a>
                                </div>
                              </td>
                            </tr>
                            <?php
                              endwhile;
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Pcoded Inner COntent **end**-->
            </div>
            <!--Pcoded  COntent **end**-->
        </div>
      </div>
    </div>
  </div>

  <?php 
    include_once 'includes/training_course_modal.php';
    include_once 'includes/scripts.php';
  ?>   

<script>

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/course_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $("#del_code").removeClass('d-none');
      $('#del_course').html(response.course_title);
      $('#del_code').html('Course Code : '+response.course_code);
      //edit
      $('.course_id').val(response.id);
      $('.course_code').val(response.course_code);
      $('.course_title').val(response.course_title);
      $('.course_details').val(response.course_details);
    }
  });
}

$(document).ready(function() {

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
    $('#table1').DataTable();
  }//**end**

    //DATA HIDE > ALERT
  $("[data-hide]").on("click", function(){
    $("#showdanger").attr('hidden',true);
  });

     //select all
  $('#globalcheck').click(function(e){
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

  $(document).on('click','.edit',function(e){
    e.preventDefault();
    $('#courseEdit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.desc',function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.delete',function(e){
    e.preventDefault();
    $('#courseDelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

</script>

</body>
</html>

