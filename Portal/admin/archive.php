<?php 
$title ="Archives";
include 'includes/session.php';
include 'includes/header.php';
?>
  <body>
  <?php //include 'includes/preloader.php'; ?>
  
  <div id="pcoded" class="pcoded">
        <div class="pcoded-container navbar-wrapper">         
        <?php include 'includes/navbar.php'?>
        <?php include 'includes/sidebar.php'?>
        
        
                  <div class="pcoded-content pb-0 mb-0">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Document Management</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#archive.php">Archive</a>
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
                        ?>

                        <!-- Archive Body -->
                        <div class="row pb-0 mb-0 pl-2">
                          <div class="col-md-9 p-0 m-0 pr-1">
                            <div class="card rounded p-0 pb-0 mb-0" >

                              <div class="border rounded">
                                <div class="card-header pb-4">
                                  <h5>
                                    <i class="ti-files mx-2" aria-hidden="true"></i> 
                                    <label id="archive_title">Archived Folders</label>
                                  </h5>
                                </div>
                              </div>

                              <div class="box-body container text-dark" id="document_file" style="max-height: 79vh;min-height: 89vh;overflow-y: auto;" >

                                <!-- Table -->
                                <div class="card-block table-border-style" style="min-height: 400px;">
                                  <div class="table-responsive">
                                    <table id="archive_table" class="table table-striped table-bordered" style="width:100%">
                                      <thead>
                                        <tr>
                                          <th id="name">Folder Name</th>
                                          <th>Date Created</th>
                                          <th id="created">Created By</th>
                                          <th style="max-width: 60px;">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody id="tbody_archive">
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <!-- Table End -->

                              </div>
                            </div>
                          </div>

                          <!-- Ease Access -->
                          <div class="col-md-3 text-white pl-0 pb-0 mb-0">
                              
                            <div class="card mb-0 pb-3" style="min-height: 100vh;">
                              <div class="card-header">
                                <h5>
                                  <i class="fa fa-archive mr-2" aria-hidden="true"></i> Archive List
                                </h5>
                              </div>

                              <div class="box-body container-fluid text-dark">
                                <ul class="list-group">
                                  <li class="nav-item ">
                                    <a class="nav-link active rounded p-1 pl-3 mb-0 list-group-item border-0 archive-list" data-toggle="list" data-archive="folder" href="javascript:void(0)">Folders</a>
                                  </li>
                                  <li class="nav-item ">
                                    <a class="nav-link rounded p-1 pl-3 mb-0 list-group-item border-0 archive-list" data-toggle="list" data-archive="document" href="javascript:void(0)">Documents</a>
                                  </li>
                                  <li class="nav-item ">
                                    <a class="nav-link rounded p-1 pl-3 mb-0 list-group-item border-0 archive-list" data-toggle="list" data-archive="employee" href="javascript:void(0)">Employees</a>
                                  </li>
                                </ul>
                              </div>

                            </div>
                          </div>

                        </div>
                        <!-- Archive Body End -->
                        
                      </div>
                      <!--Pcoded Inner COntent **end**-->
                  </div>
                  <!--Pcoded  COntent **end**-->
        </div>
    </div>



    <!-- Archive Retrieve -->
    <div class="modal fade" id="retrieveModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><b id="r-title">Retrieve</b></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <label>Are you sure you want to retrieve this archive?</label>
                        <h2 id="retrieve_title" class="bold"></h2>
                        <label id="archive_created"></label>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                  <button type="submit" class="btn btn-warning text-dark btn-flat" id="retrieveSubmit"><i class="fa fa-archive"></i> Retrieve</button>
                </div>
            </div>
        </div>
    </div>



    <?php 
      include 'includes/alert_modal.php';
      include 'includes/scripts.php';
    ?>   

<script>

const archive_table = $('#archive_table').DataTable();


// GET FOLDER ARCHIVES
function getFolder(){
  $.ajax({
    url: 'function/archive_row.php',
    type: 'POST',
    data:{archive_type:'folder'},
    dataType: 'json',
    success : (response) => {
      $('#name').html('Folder Name');
      $('#created').html('Created By');
      $('#archive_title').html("Folder Archived");
      const len = response.length; 
      for (var i = 0; i < len; i++) {
        archive_table.row.add ([
          (response)[i].folder_name,
          (new Date((response)[i].folder_date).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})),
          (response)[i].firstname + ' ' + (response)[i].lastname,
          '<button class="btn btn-warning btn-sm text-dark retrieve_btn btn-round" data-id="'+(response)[i].folder_id+'" data-type="folder" ><i class="fa fa-file"></i> Retrieve</button>'
        ]).draw();
      }
    }
  });
}


// GET Documents ARCHIVES
function getDocuments(){
  $.ajax({
    url: 'function/archive_row.php',
    type: 'POST',
    data:{archive_type:'docu'},
    dataType: 'json',
    success : (response) => {
      $('#name').html('Document Name');
      $('#created').html('Owner');
      $('#archive_title').html("Documents Archive");
      const len = response.length; 
      for (var i = 0; i < len; i++) {
        archive_table.row.add ([
          (response)[i].document_name,
          (new Date((response)[i].document_date).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})),
          ((response)[i].document_owner != '')? (response)[i].document_owner: 'N/A',
          '<button class="btn btn-warning btn-sm text-dark retrieve_btn btn-round" data-id="'+
          (response)[i].document_id+'" data-type="docu"><i class="fa fa-file"></i> Retrieve</button>'
        ]).draw();
      }
    }
  });
}


// GET Documents ARCHIVES
function getEmployees(){
  $.ajax({
    url: 'function/archive_row.php',
    type: 'POST',
    data:{archive_type:'emp'},
    dataType: 'json',
    success : (response) => {
      $('#name').html('Employee Name');
      $('#created').html('Date Hired');
      $('#archive_title').html("Employees Archive");
      const len = response.length; 
      for (var i = 0; i < len; i++) {
        archive_table.row.add ([
          (response)[i].firstname + ' ' + (response)[i].lastname,
          (new Date((response)[i].created_date).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})),
          (new Date((response)[i].date_hired).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})),
          '<button class="btn btn-warning btn-sm text-dark retrieve_btn btn-round" data-id="'+
          (response)[i].employee_id+'" data-type="emp" ><i class="fa fa-file"></i> Retrieve</button>'
        ]).draw();
      }
    }
  });
}

// RETRIEVE DATA
function retrieveArchive(type,id){
  $.ajax({
    async:'false',
    url: 'function/archive_retrieve.php',
    type: 'POST',
    data:{archive_type:type,id:id},
    dataType: 'json',
    success : (response) => {
      if (response=='1'){ // 1 Successful
        $('#successModal').modal('show');
        $('#success_msg').html('Archive retrieved successfully');
      }else{
        $('#errorModal').modal('show');
        $('#error_msg').html('Archive retrieval failed');
      }
    }
  });
  getArchive(type);  //GET UPDATED ARCHIVE AFTER RETRIEVING
}



function specificArchive(type,id){
  $.ajax({
    async:'false',
    url: 'function/archive_row.php',
    type: 'POST',
    data:{s_type:type,s_id:id},
    dataType: 'json',
    success : (response) => {


      if (type=='folder') {
        $('#r-title').html('Retrieve Folder');
        $('#retrieve_title').html(response.folder_name);
        $('#archive_created').html('Date Created: '+(new Date(response.folder_date).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})));
      }else if(type=='docu') {
        $('#r-title').html('Retrieve Document');
        $('#retrieve_title').html(response.document_name);
        $('#archive_created').html('Date Created: '+(new Date(response.document_date).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})));
      }else {
        $('#r-title').html('Retrieve Employee');
        $('#retrieve_title').html(response.firstname+
          ' '+response.lastname);
        $('#archive_created').html('Date Hired: '+ (new Date(response.date_hired).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})));
      }

    }
  });
}

//GET THE ARCHIVE DETAILS BY TYPE
function getArchive(archive_type){
  archive_table.clear().draw();
  archive_type = (archive_type=='docu')? 'document': archive_type;
  archive_type = (archive_type=='emp')? 'employee': archive_type;
  if (archive_type=='folder') {
    getFolder();
  }else if(archive_type=='document') {
    getDocuments();
  }else if (archive_type=='employee') {
    getEmployees();
  }
}


$(document).ready(function() {

  // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
  $('body').on('hidden.bs.modal', function () {
    if($('.modal.show').length > 0){
      $('body').addClass('modal-open');
    }
  });

  // ARCHIVE LIST BTN
  $(document).on('click','.archive-list', function () {
    const archive_type = $(this).data('archive');
    getArchive(archive_type);
    sessionStorage.setItem('archive_session',archive_type);
  });

  // RETRIEVE ARCHIVE DATA FOLDER/DOCU/EMPLOYEE
  $(document).on('click','.retrieve_btn', function () {
    let type = $(this).data('type');
    let id = $(this).data('id');
    $('#retrieveSubmit').data('type', type);
    $('#retrieveSubmit').data('id', id);
    // get the archive details (specific)
    specificArchive(type,id);
    $('#retrieveModal').modal('show');
  });

  $(document).on('click','#retrieveSubmit', function () {
    let type = $(this).data('type');
    let id = $(this).data('id');
    $('#retrieveSubmit').attr('data-type','');
    $('#retrieveSubmit').attr('data-id', '');
    if (type!='') {
      retrieveArchive(type,id); 
    }
    $('#retrieveModal').modal('hide');
  });
  

  // SHOW SELECTED ARCHIVE LIST -> IF PAGE IS RELOADED
  var archive_session = sessionStorage.getItem('archive_session');
  if(archive_session){
    $('.list-group .nav-item .nav-link').removeClass("active");
    $('.list-group').find('li a[data-archive="' + archive_session + '"]').addClass('active');
    getArchive(archive_session);
  }else{
    getFolder(); //default
  }
  //ACTIVE TAB **END**


});
</script>


</body>
</html>

