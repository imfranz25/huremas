<?php 
  $title ="Evaluation";
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
                          <h5 class="m-b-10">Employee Evaluation</h5>
                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <ul class="breadcrumb-title">
                          <li class="breadcrumb-item">
                            <a href="index.php"> <i class="fa fa-home"></i></a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="#!">Task & Evaluation</a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="#!">Employee Evaluation</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Page-header end -->

                <div class="pcoded-inner-content">
                  <?php include_once 'includes/session_alert.php'; ?>   
                  <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
                    <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
                    <h4>
                      <i class='icon fa fa-warning'></i> Note !
                    </h4>
                    <label id="warning"></label>
                  </div>

                  <!-- Main-body start -->
                  <section class="content">
            	      <div class="container-fluid">
          	        <?php 
        	            $page = $_GET['page'];
        	            include $page.'.php';
          	         ?>
            	      </div>
                    <!--/. container-fluid -->
            	    </section>
                  <!-- Main-body end -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  <?php include 'includes/evaluation_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>


<script>

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/evaluation_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $("#eid").val(response.id);
      //view
      $("#Task").html(response.task);
      $("#Assign").html(response.name);
      $("#Date").html(response.date_created);
      $("#Remarks").html(response.remarks);
      $("#Efficiency").html(response.efficiency);
      $("#Timeliness").html(response.timeliness);
      $("#Quality").html(response.quality);
      $("#Accuracy").html(response.accuracy);
      $("#pa").html(response.pa);
    }
  });
}

$(document).ready(function() {

  $('.delete_evaluation').click(function(e){
    e.preventDefault();
    $('#deleteEval').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.view_evaluation').click(function(e){
    e.preventDefault();
    $('#viewEval').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

</script>

</body>
</html>

