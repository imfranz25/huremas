<?php 
  $title ="Designations & Departments";
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
                        <h5 class="m-b-10">Designations & Departments</h5>
                        <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                          <a href="index.php"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item">
                          <a href="position.php">Designations & Departments</a>
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
                            <a class="nav-link active" data-toggle="tab" href="#CAreq" role="tab">Designation</a>
                            <div class="slide"></div>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#CAapp" role="tab">Department</a>
                            <div class="slide"></div>
                          </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="CAreq" role="tabpanel">
                            <?php include 'positions.php'; ?>  
                          </div>
                          <div class="tab-pane " id="CAapp" role="tabpanel">
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
      </div>

  <?php include 'includes/position_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>

    

<script>


function changelabel(){
  var sal = $("#typeS").val();
  var bs = document.getElementById("bs");
  var rph = document.getElementById("rph");
  var rate = document.getElementById("rate");
  if(sal==1){
    bs.style.display = "block";
    rph.style.display = "none";
    rate.value="";
  }else{
    rph.style.display = "block";
    bs.style.display = "none";
    rate.value=180;
  }
}

function changelabel2(){
  var sal = $("#typeS2").val();
  var bs = document.getElementById("bs2");
  var rph = document.getElementById("rph2");
  var rate = document.getElementById("edit_rate");
  if(sal=='Contractual (CNT)'){
    bs.style.display = "block";
    rph.style.display = "none";
  }else{
    rph.style.display = "block";
    bs.style.display = "none";
  }
}

function ssl_table(){
  var grade = $("#sslx").val();
  var step = $("#step").val();
  if((grade!="")&&(step!="")){
    getSSL(grade,step);
  }
}

function ssl_table2(){
  var grade = $("#sslx2").val();
  var step = $("#step2").val();
  if((grade!="")&&(step!="")){
    getSSL2(grade,step);
  }
}

function getSSL(id,step){
  $.ajax({
    type: 'POST',
    url: 'function/ssl_row.php',
    data: {id:id,step:step},
    dataType: 'json',
    success: function(response){
      $('#rate').val(response.res);
    }
  });
}
function getSSL2(id,step){
  $.ajax({
    type: 'POST',
    url: 'function/ssl_row.php',
    data: {id:id,step:step},
    dataType: 'json',
    success: function(response){
      $('#edit_rate').val(response.res);
    }
  });
}

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
      if(response.type==1){
        $('#typeS2').val('Contractual (CNT)');
      }else{
        $('#typeS2').val('Job Order (JO)');
      }
      changelabel2();
      $('#sslx2 option[value='+response.grade+']').attr('selected','selected');
      $('#step2 option[value='+response.step+']').attr('selected','selected');
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

  // POPULATE TABLE
  ssl_table();

  // DATA TABLE
  $('#table1').DataTable();
  $('#table2').DataTable();

  $(document).on('click','.edit',function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.delete',function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.edit2',function(e){
    e.preventDefault();
    $('#edit2').modal('show');
    var id = $(this).data('id');
    getRow2(id);
  });

  $(document).on('click','.delete2',function(e){
    e.preventDefault();
    $('#delete2').modal('show');
    var id = $(this).data('id');
    getRow2(id);
  });

});

</script>

</body>
</html>


