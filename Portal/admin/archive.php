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
                                    <label id="archive_title">Archive Title</label>
                                  </h5>
                                </div>
                              </div>


                              <div class="box-body container text-dark" id="document_file" style="max-height: 79vh;min-height: 79vh;overflow-y: auto;" >

                                <!-- Table -->

                              </div>
                            </div>
                          </div>

                          <!-- Ease Access -->
                          <div class="col-md-3 text-white pl-0 pb-0 mb-0">
                              <div class="card mb-0 pb-3 h-100" style="overflow-y:auto;max-height: 100vh;min-height:100vh;">
                                <div class="card-header">
                                  <h5>
                                    <i class="fa fa-archive-o mr-2" aria-hidden="true"></i> Archive List
                                  </h5>
                                </div>
                                <div class="box-body container text-dark">
                                  <ul class="list-group">
                                      <a class="nav-item active rounded bg p-1 pl-3 mb-0 text-left folder-list folder-class list-group-item border-0" data-toggle="list" data-archive="folder" href="javascript:void(0)">Folders</a>
                                      <a class="nav-item rounded bg p-1 pl-3 mb-0 text-left folder-list folder-class list-group-item border-0" data-toggle="list" data-archive="document" href="javascript:void(0)">Documents</a>
                                      <a class="nav-item rounded bg p-1 pl-3 mb-0 text-left folder-list folder-class list-group-item border-0" data-toggle="list" data-archive="document" href="javascript:void(0)">Employees</a>
                                  </ul>
                                </div>
                            </div>
                          </div>

                        </div>
                        <!-- Archive Body -->
                        
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






$(document).ready(function() {


  // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
  $('body').on('hidden.bs.modal', function () {
    if($('.modal.show').length > 0){
      $('body').addClass('modal-open');
    }
  });

  // ensure that the other tab pane is hidden when the other one is shown :)
  $('.nav-tabs a').on('shown.bs.tab', function(){
    var activeTab = $(this).attr('href');
    $(".tab-pane").hide();
    $(activeTab).show();
  });//**end**

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


});
</script>


</body>
</html>

