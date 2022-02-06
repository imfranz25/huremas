<?php 
$title ="Trainings";
require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/header.php");
?>
  <body>
   <?php require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/preloader.php"); ?>
  
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
                                          <h5 class="m-b-10">Training</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="training.php">Training</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">


                        <?php
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
                            if(isset($_SESSION['warning'])){
                            echo "
                                <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Note! (Please Update Deduction/Tax Vendor first !)</h4>
                                ".$_SESSION['warning']."
                                </div>
                            ";
                            unset($_SESSION['warning']);
                            }
                            
                        ?>

                             <!-- Main-body start -->
                            <div class="card">             
                              <div class="box-body">
                                <div class="card-block table-border-style">

                                  <div class="col-xl-12 col-xl-6">
                                      <!-- Nav tabs -->
                                      <ul class="nav nav-tabs md-tabs" role="tablist" id="training_tab">
                                        <li class="nav-item">
                                          <a class="nav-link" data-toggle="tab" href="#reqtab" role="tab">Request</a>
                                          <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link active" data-toggle="tab" href="#attab" role="tab">My Trainings</a>
                                          <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" data-toggle="tab" href="#rejtab" role="tab">Rejected</a>
                                          <div class="slide"></div>
                                        </li>
                                      </ul>
                                  </div>

                                      <!-- Tab panes -->
                                  <div class="tab-content">
                                    <!--Vendor Table-->
                                    <div class="card container tab-pane fade" id="reqtab">
                                       <?php include 'training_request.php'; ?>  
                                    </div>
                                    <!--Deduction Table-->
                                    <div class="card container tab-pane fade show active" id="attab">
                                      <?php include 'training_list.php'; ?>
                                    </div>
                                    <!--Tax Table-->
                                    <div class="card container tab-pane fade" id="rejtab">
                                      <?php include 'training_reject.php'; ?>
                                    </div>
                                  </div>
                                      <!-- Tab panes **End** -->
                                </div>
                              </div>
                            </div>
                            <!-- Main-body end -->
                      
                                         
  
                        </div>
                        <!--Pcoded Inner COntent **end**-->
                  </div>
                  <!--Pcoded  COntent **end**-->
        </div>
    </div>


    <?php 

      require_once('includes/training_modal.php');
      require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/alert_modal.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/Portal/admin/includes/scripts.php");
      require_once('includes/training_rate_modal.php');
      
    ?>   


<script>

  //HIDE ALL TAB PANES
  function hide_panes(){
    $('#reqtab').hide();
    $('#attab').hide();
    $('#rejtab').hide();
  }

  //GET TRAINING RECORD
  function getRecord(code){
    $.ajax({
      type: 'POST',
      url: '/Portal/admin/function/training_record_row.php',
      data: {record:code},
      dataType: 'json',
      success :function(response){
        //review
        $('.ref_review').val(response.reference_no);
        $('.training_course_view').val(response.course_title);
        $('.training_mode').val(response.training_mode);
        $('.training_trainer').val(response.training_trainer);
        $('#input-9').rating('update',((response.review!='0')?response.review:''));
        $('#text_comment').val((response.comment!='')?response.comment:'');
        //remove
        $('#cancel_tra').val(response.reference_no);
        $('#cancel_title').html(response.training_title);
        $('#cancel_ref').html('Reference No : '+response.reference_no);
        //edit
        $('.training_code').val(response.training_code);
        $('.training_title').val(response.training_title);
        $('.reference_no').val(response.reference_no);
        $('.edit_note').val(response.internal_note);
        $('.from_view').val('From : '+ new Date(response.schedule_from).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric', hour:'numeric',minute:'numeric'}));
        $('.to_view').val('To : '+ new Date(response.schedule_to).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric', hour:'numeric',minute:'numeric'}));

      }
    });
  }

  //GET TRAINING  details (ADMIN FUNCTION)
  function getTraining(id){
    $.ajax({
      type: 'POST',
      url: '/Portal/admin/function/training_list_row.php',
      data: {id:id},
      dataType: 'json',
      success :function(response){
        //view
        $('.training_code').val(response.training_code);
        $('.training_title').val(response.training_title);
        $('.training_objective').val(response.training_objective);
        $('.training_size').val(response.batch_size);
        $('.training_mode').val(response.training_mode);
        $('.training_trainer').val(response.training_trainer);
        $('.training_exp').val(response.training_experience);
        $('.training_details').val(response.training_details);
        $('.training_course_view').val(response.course_title);
        $('.training_vendor_view').val(response.vendor_name);
        $('.from_view').val('From : '+ new Date(response.schedule_from).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric', hour:'numeric',minute:'numeric'}));
        $('.to_view').val('To : '+ new Date(response.schedule_to).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric', hour:'numeric',minute:'numeric'}));
      }

    });
  }

  //HIDE ALL TABS
  function hide_ttab(){
    $("#attab").hide();
    $("#rejtab").hide();
    $("#reqtab").hide();
  }


  $(document).ready(function() {

    // to avoid the re-initialization of datatable
    if ( ! $.fn.DataTable.isDataTable( '#table1' ) && ! $.fn.DataTable.isDataTable( '#table2' ) && ! $.fn.DataTable.isDataTable( '#table3' ) && ! $.fn.DataTable.isDataTable( '#table4' ) ) {
      $('#table1').DataTable();
      $('#table2').dataTable( {
        "order": []
      });
      $('#table3').DataTable();
      $('#table4').DataTable();
    }//**end**


    // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
    $('body').on('hidden.bs.modal', function () {
      if($('.modal.show').length > 0){
        $('body').addClass('modal-open');
      }
    });

    // STORE ACTIVE TAB (INCASE USER RELOAD THE PAGE IT RETURNS TO ACTIVATED TAB) :) UWU
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      sessionStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = sessionStorage.getItem('activeTab');
    if(activeTab){
      $('#attab').hide();
      $('#training_tab a[href="' + activeTab + '"]').tab('show');
      if (activeTab=='#attab'){
        $('#attab').show();
      }else{
        $('#attab').hide();
      }
    }
    //ACTIVE TAB **END**

    // ensure that the other tab pane is hidden when the other one is shown :)
    $('.nav-tabs a').on('shown.bs.tab', function(){
      var showTab = $(this).attr('href');
      hide_ttab();
      $(showTab).show();
    });//**end**

    // ensure that the other tab pane is hidden when the other one is shown :)
    $(document).on('shown.bs.tab','.nav-tabs a', function(){
      var activeTab = $(this).attr('href');
      hide_panes();
      $(activeTab).show();
    });//**end**

    //VIEW TAINING (EYE)
    $(document).on('click','.view_tra', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getTraining(id);
      $('#trainingView').modal('show');
    });//**end**
    
    //REQUEST TRAINING
    $(document).on('click','.request_tra', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getTraining(id);
      $('#reqnew').modal('show');
    });//**end**

    //REQUEST TRAINING
    $(document).on('click','.edit_req', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRecord(id);
      $('#reqedit').modal('show');
    });//**end**

    //VIEW REQUEST
    $(document).on('click','.view_req', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRecord(id);
      $('#reqview').modal('show');
    });//**end**

    //CALCEL TRAINING
    $(document).on('click','.cancel_req', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRecord(id);
      $('#cancel_req').modal('show');
    });//**end**

    //RESHOW DATATABLE
    $(document).on("mouseenter",'#training_list_modal', function (e) {
      $('#table1').DataTable(); 
      $('#table4').DataTable(); 
    });

    //VIEW TRAINING
    $(document).on("click",'.view_training', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      getTraining(id);
      $('#trainingView').modal('show');
    });

    //REVIEW TRAINING
    $(document).on("click",'.rev_training', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      getRecord(id);
      $('#trainingRev').modal('show');
    });

    //Edit TRAINING
    $(document).on("click",'.rev_edit', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      getRecord(id);
      $('#trainingRev_edit').modal('show');
    });

    

    //REQUEST TRAINING
    $(document).on('submit','#sendForm', function(e){
      e.preventDefault();
      var note = $('#note_req').val();
      var code = $('#tra_code_req').val();
      $.ajax({
        type: 'POST',
        url: 'function/training_record_add.php',
        data: {note:note,code:code},
        dataType: 'json',
        success: function(response){
          if (response=='1') {
            $('#successModal').modal('show');
            $('#success_msg').html('Request sent successfuly');
          }else{
            $('#errorModal').modal('show');
            $('#error_msg').html('Request failed');
          }
          $('#reqnew').modal('hide');
          $("#refresh_tabcontent").load(location.href+" #refresh_tabcontent>*","");
          $("#refresh_request").load(location.href+" #refresh_request>*","");
        }
      });
    });//**end**


    $("#attab").show();

  });

</script>

</body>
</html>

