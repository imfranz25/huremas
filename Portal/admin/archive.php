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
                                    <a class="nav-link active rounded p-1 pl-3 mb-0 list-group-item border-0 archive-list" data-toggle="list" data-archive="document" href="javascript:void(0)">Documents</a>
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
      $('#archive_title').html("Archived Folder");
      const len = response.length; 
      for (var i = 0; i < len; i++) {
        archive_table.row.add ([
          (response)[i].folder_name,
          (new Date((response)[i].folder_date).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})),
          (response)[i].firstname + ' ' + (response)[i].lastname,
          '<button class="btn btn-warning btn-sm text-dark btn-round data-id="'+
          (response)[i].folder_id+'"><i class="fa fa-file"></i> Retrieve</button>'
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
      $('#archive_title').html("Archived Documents");
      const len = response.length; 
      for (var i = 0; i < len; i++) {
        archive_table.row.add ([
          (response)[i].document_name,
          (new Date((response)[i].document_date).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})),
          ((response)[i].document_owner != '')? (response)[i].document_owner: 'N/A',
          '<button class="btn btn-warning btn-sm text-dark btn-round data-id="'+
          (response)[i].document_id+'"><i class="fa fa-file"></i> Retrieve</button>'
        ]).draw();
      }
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

  $(document).on('click','.archive-list', function () {
    const archive_type = $(this).data('archive');
    archive_table.clear().draw();
    if (archive_type=='folder') {
      getFolder();
    }else if(archive_type=='document') {
      getDocuments();
    }
  });
  

 
  // GET FOLDER DETAILS (FOR STARTER)
  getFolder();


  /*

  // FOLDER NAVIGATION
  $(document).on('click','.folder-list', function (e) {
    e.preventDefault();
    let prev_folder_id =  $(".folder_insert").data("folder_id");
    let folder_type = $(this).data("folder");
    let folder_id = $(this).data("folder_id");
    $(".close_docu").data("folder_id",folder_id);
    // CHANGE DOCUMENT VIEW IF ITS NOT THE SAME TAB/FOLDER
    if (prev_folder_id!=folder_id) {
      document_list(folder_id);
      set_document_infos(folder_type,folder_id);
      //STORE TO SESSION STORAGE
      sessionStorage.setItem('folder_id_session',folder_id);
      sessionStorage.setItem('folder_type_session',folder_type);
    }
  });

  // SHOW SELECTED FOLDER -> IF PAGE IS RELOADED
  var folder_id_session = sessionStorage.getItem('folder_id_session');
  var folder_type_session = sessionStorage.getItem('folder_type_session');
  if(folder_id_session){
    $('.list-group .nav-item').removeClass("active");
    $('.list-group').find('a[data-folder_id="' + folder_id_session + '"]').addClass('active');
    set_document_infos(folder_type_session,folder_id_session);
    document_list(folder_id_session);
    $(".close_docu").data('folder_id',folder_id_session);
  }
  //ACTIVE TAB **END**

  */

});
</script>


</body>
</html>

