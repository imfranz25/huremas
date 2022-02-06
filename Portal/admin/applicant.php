<?php 
$title ="Applicant Tracking";
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
                                          <h5 class="m-b-10">Applicant Tracking</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Applicant Tracking</a>
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

                        <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#newJob" id="btnJob"><i class="fa fa-plus"></i>Add New Job</button>

                        

                        <div class="btn-group float-right">
                          <button type="button" class="btn btn-mat waves-effect waves-light btn-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-filter"></i>Filter</button>
                          <div class="dropdown-menu dropdown-menu-right" style="cursor: pointer;">
                            <a class="dropdown-item filter_job active" data-id='all' href="javascript:void(0)" id="job_all">All</a>
                            <a class="dropdown-item filter_job" data-id='starred' href="javascript:void(0)">Starred</a>
                            <a class="dropdown-item filter_job" data-id='active' href="javascript:void(0)">Active</a>
                            <a class="dropdown-item filter_job" data-id='inactive' href="javascript:void(0)">Inactive</a>
                          </div>
                        </div>
                        
                            <!-- Main-body start -->
                            <div class="card mb-0 ">    
                              <div class="card-header">
                                <ul class="breadcrumb-title">
                                  <li class="breadcrumb-item">
                                    <a class="reload_card" href="javascript:void(0)"><h5>Recruitment</h5></a>
                                  </li>
                                  <li class="breadcrumb-item">
                                    <a class="reload_card" href="javascript:void(0)"><label id="job_breadcrumb">All</label></a>
                                  </li>
                                  <!--Filter here-->
                                </ul>
                                <div class="card-header-right">
                                  <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-refresh reload_card"></i></li>
                                  </ul>
                                </div>
                              </div>         
                              <div class="box-body" id="job_data" style="height: 500px;">
                                <div class="card-block table-border-style row text-justify mh-100" style="overflow-y: scroll !important;">
                                  <!--PHP Start-->
                                  <?php 

                                    //initialization
                                    $show_count = 0;
                                    
                                    //filter out when session filter isset
                                    if (isset($_SESSION['filter'])) {
                                      $sort = $_SESSION['filter'];
                                      unset($_SESSION['filter']);
                                    }else{
                                      $sort = 'all';
                                    }
                                    
                                    //SET FILTER TVALUE
                                    if($sort=='starred'){
                                      $filter = "WHERE job.job_status='starred' ";
                                    }else{
                                      //Default Filter (Show all star->act->inac)
                                        $filter = "ORDER BY case WHEN job.job_status = 'starred' THEN 1 WHEN job.job_status = 'active' THEN 2 ELSE 3 END ASC";
                                    }



                                    $sql = "SELECT *, job.id AS jid, (SELECT COUNT(job_code) FROM  applicant WHERE job_code = job.job_code AND stage='New Candidates') AS newapp, (SELECT COUNT(stage) FROM  applicant WHERE job_code = job.job_code AND stage='On-Board') AS onboard FROM job LEFT JOIN position ON position.id=job.job_position $filter ";

                                    $query = $conn->query($sql);

                                      if ($query->num_rows > 0) {
                                        while($row = $query->fetch_assoc()){
                                          //Starred Design
                                          if ($row['job_status']=='starred') {
                                            $star = 'fa-star';
                                          }else{$star = 'fa-star-o';}
                                          //show active (hired==full -> continue)
                                          if($sort=='active'){
                                            if ($row['onboard']>=$row['job_recruit']){continue;}
                                          }else if ($sort=='inactive') {
                                            if ($row['onboard']<$row['job_recruit']){
                                              continue;}
                                          }
                                          //increment showed details
                                          $show_count += 1;
                                          
                                  ?>

                                  <!--Sample Recuit Box-->
                                  <div class="col-md-6 col-lg-4">
                                    <div class="card rounded border border-secondary">
                                      <div class="card-header p-0 m-0">
                                        <div class="bg-success text-white px-3 pt-3 pb-1 rounded-top">
                                          <h4>
                                            <a href="javascript:void(0)"><i data-id="<?php echo $row['job_code']; ?>" class="fa <?php echo $star; ?> starred text-warning f-20 mr-2" style="color: white;" id="<?php echo $row['job_code']; ?>"></i></a><?php echo $row['description'];  ?>
                                            <!-- Settings Dropdown -->
                                            <div class="btn-group float-right">
                                               <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v f-16 text-white" ></i></a>
                                              <div class="dropdown-menu">
                                                <a class="dropdown-item" class="btn" href="javascript:void(0)"  onclick="showView(<?php echo $row['jid'];?>)">Details</a>
                                                <a href="javascript:void(0)" class="dropdown-item" class="btn" onclick="showEdit(<?php echo $row['jid'];?>)">Edit</a>
                                                <a href="javascript:void(0)" class="dropdown-item" class="btn" onclick="showTrack('<?php echo $row['job_code'];?>')">Show Applicants</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item text-danger btn" onclick="showDelete(<?php echo $row['jid'];?>)">Delete</a>
                                              </div>
                                            </div>
                                          </h4>
                                        </div>
                                      </div>

                                      <div class="card-body row pt-4 pb-2">
                                        <div class="col-12 col-sm-5">
                                          <a type="button" class="btn bg-success text-white rounded f-13 p-2" onclick="showTrack('<?php echo $row['job_code'];?>')" ><i class="fa fa-id-card mr-1"></i>Applicants</a>
                                        </div>
                                        <div class="col-12 col-sm-7">
                                          <div class="d-flex align-content-center"><label class="badge badge-danger mr-1 f-14"><?php echo $row['newapp']; ?></label>&nbsp;<label>New Application</label></div>
                                          <div class="d-flex align-content-center"><label class="badge badge-info mr-1 f-14"><?php echo $row['job_recruit']; ?></label>&nbsp;<label>to Recruit</label></div>
                                          <div class="d-flex align-content-center"><label class="badge badge-success mr-1 f-14"><?php echo $row['onboard']; ?></label>&nbsp;<label>On-Boarded</label></div>
                                        </div>
                                      </div>

                                      <div class="card-footer border border-top-1 p-0 m-0">
                                        <div class="text-white rounded-bottom p-1">
                                          <h4 class="text-right pr-2">
                                          <a href="<?php echo "http://huremas-cvsuic.online/Home/job/job-posted.php?job_code=".password_hash($row['job_code'],PASSWORD_DEFAULT); ?>" class="copy_link">
                                            <i class="fa fa-paperclip mr-2"></i>Share Tracker</a>
                                          </h4>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <?php 
                                    }}if ($show_count < 1){
                                  ?>

                                  <!--No Job Post-->
                                  <div class="row m-auto">
                                    <div class="col-lg-12 p-3 text-center">
                                      <img src="../assets/images/jobpost.jpg" alt="No Notification" class="img-radius img-fluid mx-auto d-block p-4 w-50">
                                      <h5>THERE ARE NO ACTIVE JOB POSTING AT THE MOMENT</h5>
                                      <label>Create Job Details to view job posts here !</label>
                                      <button type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto mb-3 mt-3 reload_card">Refresh</button>
                                    </div>
                                  </div>
                                  <!--No Job Post End-->

                                  <?php } ?>
                                  <!--PHP END-->
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
      include 'includes/applicant_modal.php';
      include 'includes/tracking_modal.php';
      include 'includes/onboard_modal.php';
      include 'includes/alert_modal.php';
      include 'includes/scripts.php';
    ?>   

<script>

//INITIALIZATION FOR FORM ONBOARD VALUES (GLOBAL)
var app_job_code ='';
var appno_on='';
var fname_on='';
var mname_on='';
var lname_on='';
var contact_on='';
var email_on='';
var position_on='';
var position_desc_on='';
var department_on='';
var department_desc_on='';
var category_name='';
var category_id='';

// JOB PROPERTIES
function showEdit(id){
  $("#editJob").modal('show');
  getjob(id);
}
function showDelete(id){
  $("#jobDelete").modal('show');
  getjob(id);
}
function showView(id){
  $("#jobView").modal('show');
  getjob(id);
}
//SHOW MANAGE APPLICANT MODAL
function showTrack(code){
  $("#track_modal").modal('show');
  $(".tab_code").removeClass('active');
  $("#candiTab").addClass('active');
  getapplicant(code,'New Candidates');
}
//SET TEXT ARE AND BTN TO DEFAULT
function notes_default(){
  //set to default
  $('#edit_btn').removeClass('d-none');
  $('#add_btn').addClass('d-none');
  $('#note_text').attr('readonly', true);
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

//CHECK IF FILE IS VALID (RESUME)
function check_resume(file_input) {
  //valid extension
  const valid_resume = ['pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx']; 
  check_file(file_input,valid_resume);
  return true;
} 


//SET APPLICANT INFORMATION
function set_Appinfo(code,fname,lname,id,email,contact,attachment,notes,mname,stage,appno,type,catname){
  //tracking infos
  $('#move_app_code').val(code);
  $('#move_name').html(fname+" "+lname);
  $( ".applicant_name" ).html('<i class="fa fa-vcard mr-2" aria-hidden="true"></i>'+fname+" "+lname);
  $('.move_id').attr('data-id',id); //move option id
  $('.app_id').attr('data-id',id); // on board / on-board  option id
  $('#del_app_id').val(id); //applicant name (delete modal)
  $('#del_app_name').html(fname+" "+lname); //applicant name (delete modal)
  $('.note_id').val(id); // note textarea id
  $( ".modal_email" ).html(email);
  $( ".modal_number" ).html(contact);
  $( ".modal_attachment" ).html(attachment);
  $( ".modal_note" ).val(notes);
  //hide move/onboard button if applicant is already onboard
  if (stage=='On-Board'){
    $("#onboard").addClass('d-none');
    $("#move_btn").addClass('d-none');
    $("#onboard_label").removeClass('d-none'); // show onboard label
  }else{
      $("#move_btn").removeClass('d-none');
      $("#onboard_label").addClass('d-none'); // hide onboard label
  }
  //ensure onboard only appear in hired stage
  (stage!='Hired')? $("#onboard").addClass('d-none'): $("#onboard").removeClass('d-none');
  //onboard infos
  if (stage=='Hired') {
    //asign values for on-board input variables
    app_job_code=code;
    appno_on=appno;
    fname_on=fname;
    mname_on=mname;
    lname_on=lname;
    contact_on=contact;
    email_on=email;
    category_id=type;
    category_name=catname;
  }


  //SET LINK FOR ATTACHMENTS
  //const extension = attachment.split('.').pop();
  var link ='';
  /*
  GOOGLE VIEWER FOR WORD DOCUMENT -> APPLICABLE ONLY IF THE WEBSITE/SERVER IS UP ONLINE
  if (extension == 'docx' || extension == 'doc' || extension == 'docm'){
    var link = 'https://docs.google.com/viewer?url=';
  }
  */
  //temporary
  $( ".attachment_link" ).attr('href',link+'uploads/applicant/'+attachment);
}

//GET JOB FUNCTION
function getjob(id){
  $.ajax({
    type: 'POST',
    url: 'function/job_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
     //delete
     $('#del_job').val(response.jid);
     $('#del_jcode').html('Job Code : '+response.job_code);
     $('#del_jobtitle').html(response.description);
     //edit
     $('#edit_id').val(response.jid);
     $('#edit_code').val(response.job_code);
     $('#edit_title').val(response.description);
     $('.edit_title').val(response.job_title);
     $('.edit_position').val(response.job_position);
     $('.edit_recruit').val(response.job_recruit);
     $('.edit_department').val(response.job_dept);
     $('.edit_department_title').val(response.title);
     $('.edit_term').val(response.job_term);
     //$('.edit_type').val(response.job_type);
     $('.edit_exp').val(response.job_exp);
     $('.edit_grade').val(response.job_grade);
     $('.edit_desc').val(response.job_desc);
    }
  });
}

//GET APPLICANT INFOS
function applicant_info(aid){
  $.ajax({
    type: 'POST',
    url: 'function/applicant_row.php',
    data: {aid:aid},
    dataType: 'json',
    success: function(response){
      set_Appinfo(response.job_code,response.first_name, response.last_name, response.id, response.email, response.contact, response.attachment, response.notes,response.middle_name,response.stage,response.applicant_no,response.ptype,response.cat);
    }
  });
}


//GET JOB FUNCTION
function getapplicant(code,stage){
  //CLEAR LIST
  $( ".list_applicant" ).html("");
  //SET NOTES FIELD TO DEFAULT
  notes_default();
  // SHOW DELETE OPTION IN DISQUALI STAGE
  (stage=='Disqualified')? $("#delete_app_btn").removeClass('d-none'): $("#delete_app_btn").addClass('d-none');
  //SHOW MOVE BTN/MENU (DEFAULT)
  $(".move_id").removeClass('d-none'); //SHOW ALL DROPDOWN MENU
  // REMOVE ACTIVE STAGE IN DROPDOWN MENU -> SPLIT ALL SPACES TO READ VIA ID TAG
  $("#"+stage.split(' ').join('')).addClass('d-none'); 
  //GET ALL APPLICANT DATA
  $.ajax({
    type: 'POST',
    url: 'function/applicant_row.php',
    data: {code:code,stage:stage},
    dataType: 'json',
    success: function(response){
      //on-board
      position_on=(response)[0].job_position;
      position_desc_on=(response)[0].description;
      department_on=(response)[0].job_dept;
      department_desc_on=(response)[0].title;
      //set tab title
      $('.tab_title').html(stage);
      $('#prevstage').val(stage);
      $('.job_title_modal').html((response)[0].description);
      //set job code 
      $('.tab_code').attr('data-id',(response)[0].job_code);
      $('.title_code').html('Job Code : '+(response)[0].job_code);
      $('#add_app_code').val((response)[0].job_code);
      //CHECK IF THERE ARE APPLICANTS  IN THIS STAGE  
      if ((response).count > 0){
        var once = true;
        $('#appTab').removeClass('d-none');
        $('#no_candidate').addClass('d-none');
        let onboard = (stage=='Hired')? 'On-Board':stage;
        //put name in the list
        for (var i = 0 ; i < (response).length; i++) {
          // INSERT APPLICANTS THAT IS CATEGORIZED IN THIS STAGE
          if ((response)[i].stage == stage || (response)[i].stage == onboard) {
            //SET INFO FOR THE FIRST APPLICANT IN THE LIST (DEFAULT)
            if (once==true){
              set_Appinfo((response)[i].job_code,(response)[i].first_name, (response)[i].last_name, (response)[i].aid, (response)[i].email, (response)[i].contact,(response)[i].attachment,(response)[i].notes,(response)[i].middle_name,(response)[i].stage,(response)[i].applicant_no,(response)[i].ptype,(response)[i].cat);
              once=false;
            }
            //APPEND LIST IN LIST GROUP
            $(".list_applicant" ).append("<a href='' data-toggle='list'  class='list-group-item flex-column f-14 listApp' data-id='"+(response)[i].aid+"'>"+(response)[i].first_name+" "+(response)[i].last_name+"</a>");
          }
        }
        // SET ACTIVE FOR THE FIRST APPLICANT IN THE LIST (DEFAULT)
        $(".list_applicant a:eq(0)").addClass("active");
      }else{
        $('#appTab').addClass('d-none');
        $('#no_candidate').removeClass('d-none');
      }
      }
  });
}

//UPDATE STARRED/STATUS
function job_status(code,element){
  $.ajax({
      type: 'POST',
      url: 'function/applicant_edit.php',
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
function reload_job_details(filter){
    //loading
    $('#job_data').html('<img class="img-radius img-fluid mx-auto d-block p-4 w-50 mb-5" src="images/job_load.gif" />');
    //default show ALL Job
    $('.filter_job').removeClass('active');
    $('#job_all').addClass('active');
    //SET SESSION VARIABLE
    $.ajax({
      url: 'function/job_filter.php',  
      dataType: 'json',  
      data: {filter:filter},                         
      type: 'GET',
      success: function(response){
        $("#job_data").load(location.href+" #job_data>*","");
      }
    });
}


$(document).ready(function() {

  //add option to select grade
  for (var i = 1; i < 34; i++) {
    $('.grade').append($('<option>', {
      value: i,
      text: i
    }));
  }

  // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
  $('body').on('hidden.bs.modal', function () {
    if($('.modal.show').length > 0){
      $('body').addClass('modal-open');
    }
  });


  // COPY LINK AND SHOW TOOLTIP
  //$('.copy_link').tooltip({title: "Link Copied!", trigger: "click"});
  $(document).on("mouseenter",'.copy_link', function (e) {
    $('.copy_link').tooltip({title: "Link Copied!", trigger: "click"});
  });
  $(document).on('click', '.copy_link', function(e) {
     e.preventDefault();
     var copyText = $(this).attr('href');
     document.addEventListener('copy', function(e) {
        e.clipboardData.setData('text/plain', copyText);
        e.preventDefault();
     }, true);
     document.execCommand('copy');  
     setTimeout(function(){ $('.copy_link').tooltip('hide'); }, 2000); 
   });

  //RESET FORM
  $('#btnJob').click(function(e){
    $('#formJob')[0].reset();
  });

  //ONCLICK FUCNTION FOR APPENDED ELEMENTS
  $(document).on('click', '.listApp', function() {
    applicant_info($(this).attr('data-id'));
    notes_default();
  });

  //MOVE APPLICANT
  $('.move_id').click(function(e){
    e.preventDefault();
    $('#moveApp').modal('show');
    //initialize value
    var id = $(this).attr('data-id');
    var stage = $(this).attr('href');
    //set value
    $('.move-title').html('Move  &#129074; '+stage);
    $('#move_app_id').val(id);
    $('#move_app_stage').val(stage);
    applicant_info(id);
  });


  //STARRED BUTTON
  $(document).on('click', '.starred', function() {
    var code = $(this).data('id');
    job_status(code,this);
  });


  //MOVE SUBMIT
  $( "#form_move" ).submit(function(e) {
    e.preventDefault();
    $('#moveApp').modal('hide');
    //get values
    var id = $('#move_app_id').val();
    var stage = $('#move_app_stage').val();
    var prevstage = $('#prevstage').val();
    var code = $('#move_app_code').val();
    $.ajax({
      type: 'POST',
      url: 'function/applicant_edit.php',
      data: {id:id,stage:stage,code:code},
      dataType: 'json',
      success: function(response){
        if (response == 1) {
          $('#successModal').modal('show');
          $('#success_msg').html('Applicant moved successfuly');
        }else if (response == 2) {
          $('#fullModal').modal('show');
          $('#warn_msg').html('The required applicants for this job is within the maximum limit !');
        }else{
          $('#errorModal').modal('show');
          $('#error_msg').html('Applicant moved failed');
        }
        getapplicant(code,prevstage); // reload page (stay on page)
      }
    });
    
  });

  // ENABLE SEND-TEXT AREA EDIT
  $('#edit_btn').click(function(e){
    $(this).addClass('d-none');
    $('#add_btn').removeClass('d-none');
    $('#note_text').removeAttr('readonly');
  });

  //SAFE NOTES TO DB
  $( "#send_note" ).submit(function(e) {
    e.preventDefault();
    var id = $('#note_id').val();
    var note = $('#note_text').val();
    
    $.ajax({
      type: 'POST',
      url: 'function/applicant_edit.php',
      data: {id:id,note:note},
      dataType: 'json',
      success: function(response){
        if(response == 1){
          $('#note_status').html('Saved !'); 
          $('#note_status').addClass('text-success');
        }else{
          $('#note_status').html('Something went wrong !');
          $('#note_status').addClass('text-danger');
          $('#note_text').val(response.notes);
        }
        //show label for sevel sec only
        $("#note_status").show();
        setTimeout(function() { $("#note_status").hide(); }, 3000);
        //set to default
        notes_default();
      }
    });
  });

  //ADD CANDIDATE
  $( "#form_add_candidate" ).submit(function(e) {
    e.preventDefault();
    var code = $('#add_app_code').val();
    //get inputs
    var form_data = new FormData($('#form_add_candidate')[0]);
    $.ajax({
        url: 'function/candidate_add.php',  
        dataType: 'json',  
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'POST',
        success: function(response){
            if (response=='1'){ // 1 Successful
              $('#successModal').modal('show');
              $('#success_msg').html('Candidate added successfuly');
              // reload page (redirect to new candidate)
              $(".tab_code").removeClass('active');
              $("#candiTab").addClass('active');
              //hide modal
              $("#newApp").modal('hide');
              getapplicant(code,'New Candidates'); 
            }else if (response=='2'){ // 2 maximum size limit
              $('#fullModal').modal('show');
              $('#warn_msg').html('The attachment size exceeds the allowable limit !');
            }else if (response=='3'){ // 3 invalid format
              $('#fullModal').modal('show');
              $('#warn_msg').html('Invalid file format !');
            }else{ // failed
              $('#errorModal').modal('show');
              $('#error_msg').html('Adding candidate failed');
            }
        }
     });
  
  });

  //RELOAD
  $('.reload_app').click(function(e){
    e.preventDefault();
    reload_job_details('All'); //reload job details
  });

  //RESET ADD CANDIDATE
  $('#addCandi').click(function(e){
    e.preventDefault();
    $('#form_add_candidate')[0].reset();
  });
  
  //FILTER JOB
  $('.filter_job').click(function(e){
    e.preventDefault();
    const filter = $(this).attr('data-id');
    //reload
    reload_job_details(filter);
    //manual  navigation
    $('.filter_job').removeClass('active');
    $(this).addClass('active');
    $('#job_breadcrumb').html(filter.charAt(0).toUpperCase()+filter.slice(1));
  });

  //FILTER JOB
  $(document).on('click', '.reload_card', function(e) {
    $('#job_breadcrumb').html('All');
    reload_job_details('all');
  }); 

  //DELETE APPLICANT
  $(document).on('click', '#delete_app_btn', function(e) {
    $('#deleteApp').modal('show');
  }); 


  //DELETE APPLICANT RECORDS (DISQUALI STAGE)
  $( "#form_delete_app" ).submit(function(e) {
    e.preventDefault();
    $('#deleteApp').modal('hide');
    var id = $('#del_app_id').val();
    var code = $('#move_app_code').val();
    var pass = $('#pass_del').val();
    $.ajax({
      type: 'POST',
      url: 'function/applicant_delete.php',
      data: {id:id,pass:pass},
      dataType: 'json',
      success: function(response){
        if (response=='1') {
          $('#successModal').modal('show');
          $('#success_msg').html('Applicant deleted successfuly');
        }else if(response=='2'){
          $('#errorModal').modal('show');
          $('#error_msg').html('Invalid Password, please try again');
        }else{
          $('#errorModal').modal('show');
          $('#error_msg').html('Applicant delete failed');
        }
        getapplicant(code,'Disqualified'); // reload page (stay on page)
      }
    });

  }); 
  

  //ON-BOARD APPLICANT
  $(document).on('click', '.on_app', function(e) {
    //SHOW MODAL ON-BOARD
    $('#onBoard').modal('show');
    //RESET ON-BOARD MODAL
    $('#msform')[0].reset();
    update_progress(1); //update progress bar
    current = 1; //reset current page
    //set page design to default
    $("#progressbar li").removeClass("active");
    $("#personal").addClass("active");
    $('fieldset').hide().css({'display': 'none','position': 'relative','opacity':0});
    $('#first_set').show().css({'opacity': 1});
    //set values from applicant infos
    $('#onboard_job').val(app_job_code);
    $('#appno_on').val(appno_on);
    $('#fname_on').val(fname_on);
    $('#mname_on').val(mname_on);
    $('#lname_on').val(lname_on);
    $('#contact_on').val(contact_on);
    $('#email_on').val(email_on);
    $('#position_on').val(position_desc_on);
    $('#positionid_on').val(position_on);
    $('#departmentid_on').val(department_on);
    $('#department_on').val(department_desc_on);
    $('#category_id').val(category_id);
    $('#category_name').val(category_name);
  }); 

  //RELOAD APPLICANT INFOS -> CLOSE ONBOARD
  $(document).on('click', '#closeOnboard', function(e) {
    var code = $('#move_app_code').val();
    getapplicant(code,'Hired'); // reload page (stay on page)
  }); 
  

  

});
</script>

</body>
</html>

