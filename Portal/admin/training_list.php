<?php 
$title ="Training";
include 'includes/session.php';
include 'includes/header.php';
?>
  <body>
  <?php include 'includes/preloader.php'; ?>
  
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
                                          <h5 class="m-b-10">Training List</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="training_list.php">Training</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="training_list.php">Training List</a>
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
                            <div class="card mb-0 ">    
                              <div class="card-header">
                                <h5>
                                  <a class="btn btn-default reload_card" href="javascript:void(0)">Trainings / &nbsp;<label id="tra_breadcrumb">All</label></a>                                  
                                </h5>
                                  
                                  <div class="btn-group float-right">
                                    <button type="button" class="btn btn-mat waves-effect waves-light btn-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-filter"></i>Filter</button>
                                    <div class="dropdown-menu dropdown-menu-right" style="cursor: pointer;">
                                      <a class="dropdown-item filter_tra active" data-id='all' href="javascript:void(0)" id="training_all">All</a>
                                      <a class="dropdown-item filter_tra" data-id='starred' href="javascript:void(0)">Starred</a>
                                      <a class="dropdown-item filter_tra" data-id='active' href="javascript:void(0)">Active</a>
                                      <a class="dropdown-item filter_tra" data-id='inactive' href="javascript:void(0)">Inactive</a>
                                    </div>
                                  </div>

                                  <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right mx-2" data-toggle="modal" data-target="#trainingNew" id="btnTRA"><i class="fa fa-plus"></i>Add Training</button>


                              </div>         
                              <div class="box-body" id="training_data" style="height: 500px;">
                                <div class="card-block table-border-style row text-justify mh-100" style="overflow-y: scroll !important;">
                                  
                                  <?php
                                    
                                    //filter out when session filter isset
                                    if (isset($_SESSION['filter'])) {
                                      $sort = $_SESSION['filter'];
                                      unset($_SESSION['filter']);
                                    }else{
                                      $sort = 'all';
                                    }
                                    
                                    //SET FILTER TVALUE
                                    if($sort=='starred'){
                                      $filter = "WHERE training_list.training_status='starred' ";
                                    }else{
                                      //Default Filter (Show all star->act->inac)
                                        $filter = "ORDER BY case WHEN training_list.training_status = 'starred' THEN 1 WHEN training_list.training_status = 'active' THEN 2 ELSE 3 END ASC";
                                    }

                                    $sql = "SELECT *, (SELECT COUNT(training_code) FROM training_record WHERE status !='Pending' AND status !='Rejected' AND training_record.training_code=training_list.training_code) AS attendees, (SELECT COUNT(training_code) FROM training_record WHERE (status ='Finished' OR status ='Reviewed') AND training_record.training_code=training_list.training_code) AS finished, (SELECT AVG(review) FROM training_record WHERE status='Reviewed' AND training_record.training_code=training_list.training_code) AS rate, (SELECT COUNT(status) FROM training_record WHERE (status ='Pending') AND training_record.training_code=training_list.training_code) AS request, (SELECT COUNT(review) FROM training_record WHERE status='Reviewed' AND training_record.training_code=training_list.training_code) AS reviewed FROM training_list LEFT JOIN training_course ON training_course.id=training_list.training_course LEFT JOIN training_vendor ON training_vendor.id=training_list.training_vendor $filter"; 
                                    $query = $conn->query($sql);
                                    $count =0;
                                    while ($row = $query->fetch_assoc()) {
                                      $result ='';
                                      if ($row['reviewed']>0) {
                                        $result = number_format($row['rate'],1).'/5';
                                      }
                                      //Starred Design
                                      if ($row['training_status']=='starred') {
                                        $star = 'fa-star';
                                      }else{$star = 'fa-star-o';}
                                       
                                      //dates
                                      $end = strtotime($row['schedule_to']);
                                      $today = strtotime(date("Y/m/d"));

                                      if($sort=='active'){
                                        if ($end <= $today) {
                                          continue;
                                        }
                                      }else if ($sort=='inactive') {
                                        if ($end > $today) {
                                          continue;
                                        }
                                      }
                                  ?>

                                  <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card rounded border border-secondary h-100 mb-1">
                                      <div class="card-header p-0 m-0 h-100">
                                        <!--Header-->
                                        <div class="bg-success text-white px-3 pt-3 pb-1 rounded-top">
                                          <h4 class="h5">
                                            <a href="javascript:void(0)"><i data-id="<?php echo $row['training_code']; ?>" class="fa <?php echo $star; ?> starred text-warning f-20 mr-2" style="color: white;"></i></a>
                                            <?php echo $row['training_title']; ?>
                                            <!--Option-->
                                            <div class="btn-group float-right">
                                              <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fa fa-ellipsis-v f-16 text-white" ></i></a>
                                              <div class="dropdown-menu">
                                                <a class="dropdown-item btn view" href="javascript:void(0)" data-id="<?php echo $row['training_code']; ?>" >Details</a>
                                                <a href="javascript:void(0)" class="dropdown-item edit btn" data-id="<?php echo $row['training_code']; ?>">Edit</a>
                                                <a href="javascript:void(0)" class="dropdown-item manage" data-id="<?php echo $row['training_code']; ?>" >Manage Training</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger delete" data-id="<?php echo $row['training_code']; ?>" >Delete</a>
                                              </div>
                                            </div>
                                          </h4>
                                        </div>

                                        <!--Body-->
                                        <div class="card-body row pt-4 pb-1">
                                        <div class="col-12 col-sm-6">
                                          <a type="button" class="btn bg-success text-white rounded f-13 p-2 manage" data-id="<?php echo $row['training_code']; ?>"><i class="fa fa-id-card mr-1"></i>Manage</a>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                          <div class="d-flex align-content-center"><label class="badge badge-danger mr-1 f-14"><?php echo $row['request']; ?></label>&nbsp;<label>Request(s)</label></div>
                                          <div class="d-flex align-content-center"><label class="badge badge-success mr-1 f-14"><?php echo $row['reviewed']; ?></label>&nbsp;<label>Reviews <?php echo $result; ?> </label></div>
                                          <div class="d-flex align-content-center"><label class="badge badge-info mr-1 f-14"><?php echo $row['batch_size']; ?></label>&nbsp;<label>Batch Size</label></div>
                                        </div>
                                        <div class="col-4 my-3 mb-0 pb-0 border border-top-0 border-left-0 border-bottom-0 mb-0">
                                          <div class="text-center">
                                            <h6 class="mb-0 pb-0"><?php echo number_format($row['training_duration'],0).' hour(s)' ?></h6>
                                            <label class="text-muted mt-0">Duration</label>
                                          </div>
                                        </div>
                                        <div class="col-4 my-3 mb-0">
                                          <div class="text-center">
                                            <h6 class="mb-0 pb-0"><?php echo $row['attendees']; ?></h6>
                                            <label class="text-muted mt-0">Attendees</label>
                                          </div>
                                        </div>
                                        <div class="col-4 my-3 border border-top-0 border-right-0 border-bottom-0 mb-0">
                                          <div class="text-center">
                                            <h6 class="mb-0 pb-0"><?php echo $row['finished']; ?></h6>
                                            <label class="text-muted mt-0">Finished</label>
                                          </div>
                                        </div>

                                      </div>
                                      </div>
                                    </div>
                                  </div>

                                  <?php $count +=1; }if ($count==0){ ?>

                             
                                  <!--No Training Post-->
                                  <div class="row m-auto">
                                    <div class="col-lg-12 p-3 text-center">
                                      <img src="../assets/images/no_training.png" alt="No Training" class="img-radius img-fluid mx-auto d-block p-4" style="width:35%;">
                                      <h5>THERE ARE NO ACTIVE TRAININGS AT THE MOMENT</h5>
                                      <label>Create Training Details to view training posts here !</label>
                                      <button type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto mb-3 mt-3 reload_card">Refresh</button>
                                    </div>
                                  </div>
                                  <!--No Training Post End-->

                                <?php }?>
                                 
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
      include 'includes/training_list_modal.php';
      include 'includes/training_record_modal.php';
      include 'includes/alert_modal.php';
      include 'includes/scripts.php';
    ?>   

<script>

  //global vars
  var add_training_code ='';
  var att_status='';
  var review_code ='';

  //set session code
  function setCode(code){
    $.ajax({
      data:{code:code},
      type: 'POST',
      url: 'function/training_list_row.php',
      dataType: 'json',
      success: function(response){
        $("#refresh_tabcontent").load(location.href+" #refresh_tabcontent>*","");
        $('#attForm')[0].reset();
        add_training_code = response;
       }  
    });
  }//GET DETAILS ****END***** 

  //DATETIME-> TIME
  function time_format(datetime){
    var d = new Date(datetime);
    return ("0" + d.getHours()).slice(-2)+':'+("0" + d.getMinutes()).slice(-2);
  }

  //DATETIME-> DATE
  function date_format(datetime){
    var d = new Date(datetime);
    return d.getFullYear()+'-'+("0" + (d.getMonth() + 1)).slice(-2)+'-'+("0" + d.getDate()).slice(-2);
  }

  //HIDE ALL TAB PANES
  function hide_panes(){
    $('#reqtab').hide();
    $('#attab').hide();
    $('#rejtab').hide();
  }

  //CLEAR DATATABLES
  function reset_tables(){
    $('#table1').DataTable().clear().draw(); 
    $('#table2').DataTable().clear().draw(); 
    $('#table3').DataTable().clear().draw(); 
  }

  //TAB DEFAULT
  function tab_default(){
    //SET PANES TO DEFAULT
    hide_panes();
    $('.nav-item').removeClass('active');
    $('#tabfirst').addClass('active');
    $('#attab').show();
  }


  //APPEND OPTION IN EMPLOYEES
  function available_employee(emp_code){
    $.ajax({
        data: {emp_code:emp_code},
        type: 'POST',
        url: 'function/training_record_row.php',
        dataType: 'json',
        success: function(response){
          $('#selectEmp').html('<option value="">--Select Employee--</option>');
          //APPEND OPTIONS
          if ((response).length > 0) {
            for (var i = 0; i < (response).length; i++) {
              $('#selectEmp').append('<option data-pos="'+(response)[i].position+'"  data-dept="'+(response)[i].department+'"  value="'+(response)[i].employee_id+'">'+(response)[i].fullname+'</option>');
            }
          }else{
            $('#selectEmp').append('<option value="nothing">No employee available at the moment</option>');
          }
        }  
      }); 
  }

  function getRecord(record){
    $.ajax({
      data:{record:record},
      type: 'POST',
      url: 'function/training_record_row.php',
      dataType: 'json',
      success: function(response){
        //review
        review_code = response.reference_no;
        //remove
        $('#del_att').html(response.firstname+' '+response.lastname);
        $('#del_attCode').html('Reference No : '+record);
        $('#refCode').val(record);
        $('#delCode').val(response.training_code);
        //view
        $('.view_emp').val(response.firstname+' '+response.lastname);
        $('.view_dept').val(response.title);
        $('.view_post').val(response.description);
        $('.view_status').val(response.status);
        $('.view_review').val((response.status=='Reviewed')? response.review+' Stars': 'No review');
        $('.att-Code').val(response.training_code);
        $('.view_note').val(response.internal_note);
        $('.view_comment').val(response.comment);


        //HIDE NOTE FOR ONGOING ATTENDEES
        if (response.status=='On-going' || response.status=='Reviewed' || response.status=='Finished') {
          $('.int_note').addClass('d-none');
        }else{
          $('.int_note').removeClass('d-none');
        }

        //SHOW COMMENTS
        if (response.status=='Reviewed') {
          $('.comment_text').removeClass('d-none');
        }else{
          $('.comment_text').addClass('d-none');
        }


        //HIDE REJECT BTN IN REJECT LIST
        if (response.status=='Rejected') { 
          $('.rej_btn').addClass('d-none');
          att_status = 'Rejected';
        }else{
          $('.rej_btn').removeClass('d-none');
          att_status = 'Pending';
        }
      }
    });
  }

  //GET DETAILS
  function getRow(id){
    $.ajax({
      data:{id:id},
      type: 'POST',
      url: 'function/training_list_row.php',
      dataType: 'json',
      success: function(response){
        //delete
        $('#del_training').html(response.training_title);
        $('#del_tcode').html('Training Code : '+response.training_code);
        //edit
        $('.code').val(response.training_code);
        $('.training_title').val(response.training_title);
        $('.training_objective').val(response.training_objective);
        $('.training_course').val(response.training_course);
        $('.training_size').val(response.batch_size);
        $('.from').val(date_format(response.schedule_from)+'T'+time_format(response.schedule_from));
        //$('.from').attr('min',date_format(response.schedule_from)+'T00:00');
        $('.to').val(date_format(response.schedule_to)+'T'+time_format(response.schedule_to));
        $('.to').attr('min',date_format(response.schedule_to)+'T00:00');
        $('.training_mode').val(response.training_mode);
        $('.training_vendor').val(response.training_vendor);
        $('.training_trainer').val(response.training_trainer);
        $('.training_exp').val(response.training_experience);
        $('.training_details').val(response.training_details);
        //view
        $('.training_course_view').val(response.course_title);
        $('.training_vendor_view').val(response.vendor_name);
        $('.from_view').val('From : '+ new Date(response.schedule_from).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric', hour:'numeric',minute:'numeric'}));
        $('.to_view').val('To : '+ new Date(response.schedule_to).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric', hour:'numeric',minute:'numeric'}));
      }  
    });
  }//GET DETAILS ****END***** 

  function process_review(status){
    $.ajax({
        data: {status:status,review_code:review_code,add_training_code:add_training_code},
        type: 'POST',
        url: 'function/training_record_delete.php',
        dataType: 'json',
        success: function(response){
          if (response=='1') {
            $('#successModal').modal('show');
            $('#success_msg').html('Attendee processed successfuly');
          }else if (response=='2') {
            $('#fullModal').modal('show');
            $('#warn_msg').html('Looks like the batch size for this training reach its limit !');
          }else if (response=='3') {
            $('#fullModal').modal('show');
            $('#warn_msg').html('Looks like this training is already finished !');
          }else{
            $('#errorModal').modal('show');
            $('#error_msg').html('Add attendee failed');
          }
          //reload
          setCode(add_training_code);
          $('#review_rej').modal('hide');
        }  
      });
  }


  //UPDATE STARRED/STATUS
  function training_status(code,element){
    $.ajax({
        type: 'POST',
        url: 'function/training_list_status.php',
        data: {status_code:code},
        dataType: 'json',
        success: function(response){
          if (response=='1'){
            $(element).removeClass('fa-star-o').addClass('fa-star');
          }else{
            $(element).removeClass('fa-star').addClass('fa-star-o');
          }
        }
      });
  }

  //RELOAD JOB DETAILS
    function reload_training_details(filter){
        //loading
        $('#training_data').html('<img class="img-radius img-fluid mx-auto d-block p-4 w-50 mb-5" src="images/job_load.gif" />');
        //default show ALL Job
        $('.filter_tra').removeClass('active');
        $('#training_all').addClass('active');
        //SET SESSION VARIABLE
        $.ajax({
          url: 'function/job_filter.php',  
          dataType: 'json',  
          data: {filter:filter},                         
          type: 'GET',
          success: function(response){
            $("#training_data").load(location.href+" #training_data>*","");
          }
        });
    }


  $(document).ready(function() {

    // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
    $('body').on('hidden.bs.modal', function () {
      if($('.modal.show').length > 0){
        $('body').addClass('modal-open');
      }
    });

    //SET MIN FOR SCHEDULE (TO)
    $('.from').on('change', function () {
      $('.to').attr('min',$(this).val());
    });

    // ensure that the other tab pane is hidden when the other one is shown :)
    $(document).on('shown.bs.tab','.nav-tabs a', function(){
      var activeTab = $(this).attr('href');
      hide_panes();
      $(activeTab).show();
    });//**end**

    //SHOW ATTENDEES
    $(document).on('click','.manage',function(e){
      e.preventDefault();
      var code = $(this).data('id');
      reset_tables();
      setCode(code);
      //SHOW MODAL
      $('#training_record_modal').modal('show');
      tab_default();
    });

    //CLEAR TABLES
    $(document).on('click','.closeModal',function(e){
      reset_tables();
      $("#training_data").load(location.href+" #training_data>*","");
    });

    //RESHOW DATATABLE
    $(document).on("mouseenter",'#training_record_modal', function (e) {
      $('#table1').DataTable(); 
      // $('#table2').DataTable(); 
      $('#table3').DataTable(); 

      // to avoid the re-initialization of datatable
      if (! $.fn.DataTable.isDataTable( '#table2' ) ) {
        $('#table2').DataTable({
          'order' : []
        });
      }//**end**

    });

    $(document).on("click",".nav a", function(){
       $('.trojan_slide').addClass('d-none');
    });

    //TRAINING PROERTIES
    $(document).on("click",'.edit', function (e) {
      e.preventDefault();
      $('#trainingEdit').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
    $(document).on("click",'.view', function (e) {
      e.preventDefault();
      $('#trainingView').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
    $(document).on("click",'.delete', function (e) {
      e.preventDefault();
      $('#trainingDelete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
    $(document).on("click",'.view_att', function (e) {
      e.preventDefault();
      $('#view_att').modal('show');
      var id = $(this).data('id');
      getRecord(id);
    });
    $(document).on("click",'.remove', function (e) {
      e.preventDefault();
      $('#attremove').modal('show');
      var id = $(this).data('id');
      getRecord(id);
    }); 
    $(document).on("click",'.review_rej', function (e) {
      e.preventDefault();
      $('#review_rej').modal('show');
      var id = $(this).data('id');
      getRecord(id);
    });

    //STARRED BUTTON
    $(document).on('click', '.starred', function() {
      var code = $(this).data('id');
      training_status(code,this);
    });

    //FILTER TTRAINING
    $('.filter_tra').click(function(e){
      e.preventDefault();
      const filter = $(this).attr('data-id');
      //reload
      reload_training_details(filter);
      //manual  navigation
      $('.filter_tra').removeClass('active');
      $(this).addClass('active');
      $('#tra_breadcrumb').html(filter.charAt(0).toUpperCase()+filter.slice(1));
    });

    //RELOAD TTRAINING
    $(document).on('click','.reload_card',function(){
      reload_training_details('All');
      $('#tra_breadcrumb').html('All');
      $(this).addClass('active');
    });
    
    //SET DEPARTMENT AND POSIITON
    $(document).on('change','#selectEmp',function(){
      if ($(this).val()=='nothing'){$('#addnew').modal('hide');}
      $('#posi').val($('#selectEmp').find(':selected').data('pos'));
      $('#department').val($('#selectEmp').find(':selected').data('dept'));
    })

    //ADD ATTENDEE BTN
    $(document).on("click",'#addAtt', function (e) {
      $("#attForm")[0].reset();
      $(".attCode").val(add_training_code); //code
      //POPULATE EMPLOYEE OPTION
      available_employee(add_training_code);
    });  
    

    //REJECT ATTENDEE
    $(document).on("click",'.rej_btn', function (e) {
      e.preventDefault();
      process_review('Rejected');
    }); 

    //APPROVE ATTENDEE
    $(document).on("click",'.app_btn', function (e) {
      e.preventDefault();
      process_review('On-going');
    }); 
    
    //REMOVE ATTENDEE TO THE LIST
    $(document).on("submit",'#removeAttForm', function (e) {
      e.preventDefault();
      var refcode =  $("#refCode").val();
      var delcode =  $("#delCode").val();
      $.ajax({
        data: {refcode:refcode},
        type: 'POST',
        url: 'function/training_record_delete.php',
        dataType: 'json',
        success: function(response){
         if (response=='1') {
            $('#successModal').modal('show');
            $('#success_msg').html('Attendee removed successfuly');
          }else{
            $('#errorModal').modal('show');
            $('#error_msg').html('Connection Timeout');
          }
          //reload
          setCode(delcode);
          $('#attremove').modal('hide');
        }  
      }); 
    }); 

    //ADD ATTENDEE (PUSH TO DB)
    $(document).on("submit",'#attForm', function (e) {
      e.preventDefault();
      //get inputs
      var code =  $(".attCode").val();
      var id =  $("#selectEmp").val();
      $.ajax({
        data: {code:code,id:id},
        type: 'POST',
        url: 'function/training_record_add.php',
        dataType: 'json',
        success: function(response){
          if (response=='1') {
            $('#successModal').modal('show');
            $('#success_msg').html('Attendee added successfuly');
          }else if (response=='2') {
            $('#fullModal').modal('show');
            $('#warn_msg').html('Looks like the batch size for this training reach its limit !');
          }else if (response=='3') {
            $('#fullModal').modal('show');
            $('#warn_msg').html('Looks like this training is already finished !');
          }else{
            $('#errorModal').modal('show');
            $('#error_msg').html('Add attendee failed');
          }
          //reload
          setCode(code);
          //reset form and hide modal
          $('#attForm')[0].reset();
          $('#addnew').modal('hide');
        }  
      }); 

    });  


  });

</script>

</body>
</html>

