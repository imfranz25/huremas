<?php 
  $title ="Disciplinary";
  require_once '../includes/path.php';
  require_once 'includes/session.php';
  require_once 'includes/header.php';
?>

<body>
  <?php include_once 'includes/preloader.php'; ?>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper">         
      <?php require_once 'includes/navbar.php'?>
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
        <?php require_once 'includes/sidebar.php'?>
        <div class="pcoded-content">
          <!-- Page-header start -->
          <div class="page-header">
            <div class="page-block">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <div class="page-header-title">
                    <h5 class="m-b-10">Disciplinary</h5>
                    <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php"> 
                          <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="employee.php">Employee</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="disciplinary.php">Disciplinary</a>
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
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs md-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#dipA" role="tab">Disciplinary Action</a>
                      <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#dipC" role="tab">Disciplinary Category</a>
                      <div class="slide"></div>
                    </li>
                  </ul>
                </div>      
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="card tab-pane fade show active" id="dipA">
                    <?php require_once 'disciplinary_action.php'; ?>  
                  </div>
                  <div class="card tab-pane fade" id="dipC">
                    <br>
                    <?php require_once 'disciplinary_category.php'; ?>
                  </div>
                </div>
                <!-- Tab panes **End** -->
              </div>
            </div>
          </div>     
          <!-- Main-body end -->
        </div>
      </div>
    </div>
  </div>


  <?php require_once 'includes/disciplinary_modal.php'; ?>
  <?php require_once 'includes/scripts.php'; ?>
    
<script>

  function DCAT_row(id){
    $.ajax({
      type: 'POST',
      url: 'function/disciplinaryC_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        //view
        $('.cat_id').val(response.id);
        $('.cat_title').val(response.title);
        $('.cat_code').val(response.code);
        $('.cat_type').val(response.cat_type);
        $('.cat_details').val(response.details);
        //delete
        $('#del_cat').html(response.title);  
      }
    });
  }


  function DA_row(id){
    $.ajax({
      type: 'POST',
      url: 'function/disciplinaryA_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        //delete
        $('#del_action_id').val(response.reference_id);
        $('#del_action').html(response.firstname+' '+response.lastname+'<br><i class="fa fa-hand-o-down text-danger" aria-hidden="true"></i><br>'+response.title);
        $('#ref_id').html('Reference ID : '+response.reference_id);
        //edit
        $('#reference_DA').val(response.reference_id);
        $('.employee_DA').val(response.employee_id);
        $('.date_DA').val(new Date(response.issued_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
        $('.reason_DA').val(response.reason);
        $('#reason_DA').val(response.title);
        $('.description_DA').val(response.internal_note);
        $('#posi2').val($('#selectEmp2').find(':selected').data('pos'));
        $('#department2').val($('#selectEmp2').find(':selected').data('dept'));  
        //view
        $('.employee_DA_view').val(response.firstname+' '+response.middlename+' '+response.lastname);
        $('.department_DA_view').val($('#selectEmp2').find(':selected').data('dept'));
        $('.posi_DA_view').val($('#selectEmp2').find(':selected').data('pos')); 
        //action
        $('.action_DA').val(response.action);
        $('.action_details_DA').val(response.action_details);
        $('.explain_DA').val(response.explanation);
        //attachment link
        $('.attachment_link_DA').html('');
        if (response.attachment!='') {
          $('.attachment_link_DA').html('<i class="fa fa-paperclip mr-2"></i><label style="cursor: pointer;"><a target="_blank" href="uploads/disciplinary/'+response.attachment+'" class="attachment_DA">'+response.attachment+'</a></label>');
        }

        //dynamic tabs (reset and append via state)
        var state_tabs =['.state_tab','.state_tab_view'];
        for (var i = 0; i < state_tabs.length; i++) {
            var view = (state_tabs[i]=='.state_tab') ? '' : '_view';
            $(state_tabs[i]).html('<li class="nav-item"><a class="nav-link first_tab active" data-toggle="tab" href="#di'+view+'">Disciplinary Information</a></li>');
        }

        //show other tabs
        if (response.state =='Responded' || response.state =='Reviewed') {
          for (var i = 0; i < state_tabs.length; i++) {
            var view = (state_tabs[i]=='.state_tab') ? '' : '_view';
            //append tabs
            $(state_tabs[i]).append('<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#er'+view+'">Employee'+"'"+'s Response</a></li>');
            $(state_tabs[i]).append('<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ad'+view+'">Action Details</a></li>');
          }
          //action required
          $('.action_DA').attr('required',true);
          $('.action_details_DA').attr('required',true);
        }else{
          $('.action_DA').attr('required',false);
          $('.action_details_DA').attr('required',false);
        }
      }
    });
  }


  $(document).ready(function() {

    //DISCIPLINARY PROPERTIES
    $(document).on('click','.edit_DA',function(e){
      e.preventDefault();
      $('#edit_action').modal('show');
      var id = $(this).data('id');
      DA_row(id);
      //set to first tab and tabpane
      $('.first_tab').trigger('click');
    });

    $(document).on('click','.view_DA',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      DA_row(id);
      //set to first tab and tabpane
      $('.first_tab').trigger('click');
    });

    $(document).on('click','.delete_DA',function(e){
      e.preventDefault();
      $('#delete_action').modal('show');
      var id = $(this).data('id');
      DA_row(id);
    });

    $(document).on('click','.view_DCAT',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      DCAT_row(id);
    });

    $(document).on('click','.edit_DCAT',function(e){
      e.preventDefault();
      $('#editCAT').modal('show');
      var id = $(this).data('id');
      DCAT_row(id);
    });

    $(document).on('click','.delete_DCAT',function(e){
      e.preventDefault();
      $('#deleteCAT').modal('show');
      var id = $(this).data('id');
      DCAT_row(id);
    });

    $(document).on('change','#selectEmp',function(e){
      var dept = $('#selectEmp').find(':selected').data('dept');
      var posi = $('#selectEmp').find(':selected').data('pos');
      $('#posi').val(posi);
      $('#department').val(dept);
    })

    $(document).on('change','#selectEmp2',function(e){
      $('#posi2').val($('#selectEmp2').find(':selected').data('pos'));
      $('#department2').val($('#selectEmp2').find(':selected').data('dept'));
    })

    // to avoid the re-initialization of datatable
    if ( ! $.fn.DataTable.isDataTable( '#table1' ) && ! $.fn.DataTable.isDataTable( '#table2' ) ) {
      $('#table1').dataTable( {
        "order": [],
      });
      $('#table2').DataTable();
    }//**end**

    // ensure that the other tab pane is hidden when the other one is shown :)
    $('.nav-tabs a').on('shown.bs.tab', function(){
      var activeTab = $(this).attr('href');
      (activeTab === "#dipC") ? 
        ($("#dipC").show(),$("#dipA").hide()) : 
        ($("#dipC").hide(),$("#dipA").show());
    });//**end**

  });



</script>

</body>
</html>


