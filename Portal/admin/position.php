<?php 
$title ="Position";
include 'includes/session.php';
include 'includes/header.php';
?>
  <body>
  <?php include 'includes/preloader.php'; ?>
  
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
                                          <h5 class="m-b-10">Designations & Departments</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Designations & Departments</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                        <?php
                            if(isset($_SESSION['error'])){
                            echo "
                                <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                                ".$_SESSION['error']."
                                </div>
                            ";
                            unset($_SESSION['error']);
                            }
                            if(isset($_SESSION['success'])){
                            echo "
                                <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-check'></i> Success!</h4>
                                ".$_SESSION['success']."
                                </div>
                            ";
                            unset($_SESSION['success']);
                            }
                        ?>
                            <!-- Main-body start -->

                            <div class="card">
                        <div class="card-block">

                            <div class="col-xl-12 col-xl-6">
                                <div class="sub-title"></div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#CAreq" role="tab">Designation</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-toggle="tab" href="#CAapp" role="tab">Department</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="CAreq" role="tabpanel">
                                            <br>
                                            <?php include 'positions.php'; ?>  
                                        </div>

                                        <div class="tab-pane " id="CAapp" role="tabpanel">
                                            <br>
                                            <?php include 'departments.php'; ?>   
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

    <?php include 'includes/position_modal.php'; ?>

    <?php include 'includes/scripts.php'; ?>

    
    <script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $('.edit2').click(function(e){
    e.preventDefault();
    $('#edit2').modal('show');
    var id = $(this).data('id');
    getRow2(id);
  });

  $('.delete2').click(function(e){
    e.preventDefault();
    $('#delete2').modal('show');
    var id = $(this).data('id');
    getRow2(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid').val(response.id);
      $('#edit_title').val(response.description);
      $('#edit_rate').val(response.rate);
      $('#del_posid').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}

function getRow2(id){
  $.ajax({
    type: 'POST',
    url: 'function/department_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#posid2').val(response.id);
      $('#edit_title2').val(response.title);
      $('#edit_code2').val(response.code);
      $('#del_posid2').val(response.id);
      $('#del_position2').html(response.title);
    }
  });
}



$(document).ready(function() {
    $('#table1').DataTable();
} );
$(document).ready(function() {
    $('#table2').DataTable();
} );
</script>

</body>
</html>


