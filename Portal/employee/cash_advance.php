<?php 
$title ="Cash Advance";
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/header.php");

?>
  <body>
  <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/preloader.php"); ?>
  
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
                                          <h5 class="m-b-10">Cash Advance</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="index.php">Home</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="cash_advance.php">Cash Advance</a>
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
                                            <a class="nav-link active" data-toggle="tab" href="#CAreq" role="tab">Pending</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#CAapp" role="tab">Approved</a>
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
                                            <?php require_once 'CA_request.php'; ?>  
                                        </div>

                                        <div class="tab-pane" id="CAapp" role="tabpanel">
                                            <br>
                                            <?php require_once 'CA_approved.php'; ?>   
                                        </div>

                                        <div class="tab-pane" id="CArej" role="tabpanel">
                                            <br>
                                            <?php require_once 'CA_rejected.php'; ?>   
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

    <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/employee/includes/CA_modal.php");  ?>

    <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/scripts.php"); ?>


    
    <script>
$(function(){

  //CA Request Properties
  $('.edit_req').click(function(e){
    e.preventDefault();
    $('#edit_req').modal('show');
    var id = $(this).data('id');
    CA_row(id);
  });
  $('.desc').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    CA_row(id);
  });
  $('.cancel_req').click(function(e){
    e.preventDefault();
    $('#cancelCA').modal('show');
    var id = $(this).data('id');
    CA_row(id);
  });

  //view satus
  $('.stat_desc').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    CA_row(id);
  });


});


function CA_row(id){
  $.ajax({
    type: 'POST',
    url: 'function/CA_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //cancel
      $('#cancel_CA').val(response.id);
      $('#cancel_ref').html(response.reference_id);
      //edit
      $('#CA_id').val(response.id);
      $('.edit_CA_date').val(new Date(response.req_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
      $('.edit_CA_type').val(response.ca_type);
      $('.edit_CA_account').val(response.ca_account);
      $('.edit_CA_amount').val(response.amount);
      $('.edit_CA_reason').val(response.ca_reason);
      $('.edit_CA_notes').val(response.notes);
      $('.edit_CA_status').val(response.status);
      $('.edit_CA_review').val(response.reviewed_by);
      
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
  
});

</script>

</body>
</html>


