<?php 
  $title ="Document";
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
                      <li class="breadcrumb-item">
                        <a href="#documents.php">Document</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page-header end -->

            <div class="pcoded-inner-content">
              <?php include_once 'includes/session_alert.php'; ?>         
              <!-- Document Body -->
              <div class="row pb-0 mb-0 pl-2">
                <div class="col-md-9 p-0 m-0 pr-1">
                  <div class="card rounded p-0 pb-0 mb-0" >
                    <div class="border rounded">
                      <div class="card-header pb-4">
                        <h5>
                          <i class="ti-files mx-2" aria-hidden="true"></i> 
                          <label id="folder_title">Institutional Records</label>
                        </h5>

                        <button type="button" class="btn btn-warning dropdown-toggle float-right text-dark" data-toggle="dropdown" aria-expanded="true">Option
                        </button>
                        <button type="button" class="btn btn-info float-right folder_insert mx-2 d-none" id="folder_view_btn" data-target="#view_custom" data-toggle="modal" aria-expanded="true"><i class="fa fa-info-circle"></i> About this Folder
                        </button>

                        <div class="dropdown-menu" style="">
                          <a class="dropdown-item folder_insert d-none" href="javascript:void(0)" id="edit_folder" data-folder="Institutional Records" data-folder_id="Institutional Records">Edit Folder</a>
                          <a class="dropdown-item folder_insert" href="javascript:void(0)" id="upload_docu" data-folder="Institutional Records" data-folder_id="Institutional Records">Upload Document</a>
                          <a class="dropdown-item folder_insert" href="javascript:void(0)" id="add_url" data-folder="Institutional Records" data-folder_id="Institutional Records">Add URL</a>
                          <div class="dropdown-divider del_fold d-none"></div>
                          <a class="dropdown-item folder_insert del_fold d-none text-" href="javascript:void(0)" id="del_folder" data-folder="Institutional Records">Move to Archive</a>
                        </div>
                      </div>

                      <div class="container col-12 mt-3 my-0 py-0">
                        <div class="input-group mb-3 container">
                          <input type="text" data-folder_id="Institutional Records" class="form-control search_document" placeholder="Search by Document Name, File Name, or Upload Date" id="search_document" aria-label="Search" aria-describedby="basic-addon1">
                          <div class="input-group-addon btn_search">
                            <span class="input-group-text" id="basic-addon1">
                            <i class="ti-search"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="box-body container text-dark" id="document_file" style="max-height: 79vh;min-height: 79vh;overflow-y: auto;" >
                      <!-- Sample Document UI Format -->
                      <div class="row">
                        <?php 
                          $docu_count = 0;
                          //DOCUMENT -> FOLDER TO BE DISPLAY
                          $folder_query="WHERE document_folder='Institutional Records' ";
                          if (isset($_SESSION['folder_name'])) {
                            $folder_name = $_SESSION['folder_name'];
                            $folder_query = "WHERE document_folder='$folder_name' ";
                            unset($_SESSION['folder_name']);
                          }
                          // QUERY
                          if (isset($_SESSION['query'])) {
                            $search =$_SESSION['query'];
                            unset($_SESSION['query']);
                          }else{
                            unset($search);
                          }

                          //EXTENSIONS
                          $ext_dp = array(array('docx', 'doc', 'docm', 'dot', 'docm', 'dotx'),array('pdf'),array('zip'),array('rar'),array('jpeg','jpg','png','gif'),array('xlsx','xlsm','xlsb','xltx'));
                          $doc_dp = array("word.png","pdf.png","zip.jpg","rar.png","img.png","excel.png");

                          $sql = "SELECT * FROM documents $folder_query AND document_archive != 1 ORDER BY document_starred DESC";
                          $query = $conn->query($sql);

                          while ($row = $query->fetch_assoc()) {
                            //INITIALIZATION
                            $file_date =(new Datetime($row['document_date']))->format('F d, Y');
                            $type = $row['document_type'];
                            $icon ='';
                            // FILTER DOCUMENTS IF THE USER -> SEARCH
                            if (isset($search)) {
                              //FOUND SET TO DEFAULT FALSE
                              $found=false;
                              //CHECK DOCUMENT NAME
                              $check_name = (stripos($row['document_name'], $search)>-1);
                              //CHECK DOCUMENT DATE
                              $check_date = (stripos($file_date, $search)>-1);
                              //CHECK FILE NAME
                              $check_file = (stripos($row['document_file'], $search))> -1;
                              // IF EITHER OF THESE TEST CASES MATCH  THE USER QUESRY -> SET FOUND TO TRUE
                              if ($check_name || $check_date || $check_file) {
                                $found=true;
                              }
                              // SKIP THIS RECORD IF IT DOESNT MATCH THE QUERY
                              if (!$found) {
                                continue;
                              }
                            }//END SEARCH

                            if ($type!='url') {
                              $ext = pathinfo($row['document_file'], PATHINFO_EXTENSION);
                              for ($i=0; $i < sizeof($ext_dp) ; $i++) { 
                                if (in_array($ext, $ext_dp[$i])) {
                                  $icon = $doc_dp[$i];
                                  break;
                                }
                              }
                              // FILE SIZE
                              $file = $_SERVER['DOCUMENT_ROOT'].$global_link."/Documents/".$row['document_id'].".".$ext;
                              $filesize = filesize($file); 
                              $filesize = round($filesize / 1024 ,2)." KB";
                            }

                            // SET ICON IMGAGE
                            if ($icon=='') {
                              if ($type=='document') {
                                $icon = "file.png";
                              }else{
                                $icon = "url.jpg";
                              }
                            }

                            $docu_count +=1;
                        ?>

                        <div class="col-md-6 document_uploads" data-id="<?php echo $row['document_id']; ?>" style="cursor:pointer;">
                          <div class="row p-3">
                            <div class="col-3 p-0 m-0 border border-right-0 border-success rounded-left">
                              <img src="../assets/images/document_dp/<?php echo $icon; ?>" alt="<?php echo ucfirst($row['document_name']); ?>" class="img-fluid" style="max-height: 100px;min-height: 100px;background: darkgreen;width: 100%;"  />
                            </div>
                            <div class="col-9 rounded-right border border-left-0 border-success" style="max-height: 100px;">
                              <div class="row">
                                <div class="col-10 p-1 pl-3 bg-success text-white"><?php echo ucfirst($row['document_name']); ?></div>
                                <div class="col-2 p-1 bg-success">
                                  <?php 
                                  $star = ($row['document_starred']==0)? 'fa-star-o':'fa-star';
                                  ?>
                                  <a href="javascript:void(0)" class="pull-right mr-1">
                                    <i class="fa <?php echo $star; ?> text-warning"></i>
                                  </a>
                                  <?php if ($row['document_status']==1){?>
                                    <a href="javascript:void(0)" class="pull-right mr-1">
                                      <i class="ti-lock text-white"></i>
                                    </a>
                                  <?php } ?>
                                </div>

                                <!-- Link -->
                                <?php if ($row['document_type']=='url') { ?>
                                  <div class="col-12 my-2 mt-3">
                                    <a target="_blank" href="<?php echo $row['document_file']; ?>" >
                                      <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;width: 200px;">
                                        <i class="ti-world mr-1"></i>
                                        <?php echo $row['document_file']; ?>
                                      </div>
                                    </a>
                                  </div>
                                <?php }else{ ?>
                                  <!-- blank space -->
                                  <div class="col-12 my-2 mt-3">
                                    <a href="javascript:void(0)">
                                      <div class="d-inline-flex align-middle align-items-center">
                                        <i class="ti-files mr-1"></i>
                                        <?php echo $filesize; ?>
                                      </div>
                                    </a>
                                  </div>
                                <?php } ?>

                                <div class="col-12">
                                  <?php echo $file_date; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      <?php 
                        }if ($docu_count==0 && !isset($search)) {
                      ?>

                      <!--No Documents-->
                      <div class="row m-auto">
                        <div class="col-lg-12 p-3 text-center">
                          <img src="../assets/images/no_docu.png" alt="No Document Upload" class="img-radius img-fluid mx-auto d-block p-4 w-50">
                          <h5>THERE ARE NO DOCUMENT UPLOAD IN THIS FOLDER</h5>
                          <label>Add Documents / URL in this folder by clicking Add URL or Upload in Folder Option.</label>
                          <button type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto mb-3 mt-3 reload_documents">Refresh</button>
                        </div>
                      </div>
                      <!--No Documents End-->
                                
                      <?php }else if ($docu_count==0 && isset($search)) {?>

                        <!--No Documents-->
                        <div class="row m-auto">
                          <div class="col-lg-12 p-3 text-center">
                            <img src="../assets/images/not_found.jpg" alt="Search Not Found" class="img-radius img-fluid mx-auto d-block p-4 w-50">
                            <h5>FILE NOT FOUND</h5>
                            <label>You can try to search via document name, file name, or date from the file was created</label>
                            <button type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto mb-3 mt-3 reload_documents">Back</button>
                          </div>
                        </div>
                        <!--No Documents End-->

                      <?php unset($search); }  ?>

                    </div>
                    <!-- Sample Document UI Format End-->
                    
                  </div>
                </div>
              </div>

              <!-- Ease Access -->
              <div class="col-md-3 text-white pl-0 pb-0 mb-0">
                <div class="card mb-0 pb-3 h-100" style="overflow-y:auto;max-height: 100vh;min-height:100vh;">
                  <div class="card-header d-flex justify-content-center">
                    <button type="button" class="btn btn-mat waves-effect waves-light btn-success m-0 w-100" data-target="#document_request_modal" data-toggle="modal" id="req_btn"><i class="ti-support"></i>Document Requests</button>
                  </div>
                  <div class="card-header">
                    <h5><i class="fa fa-folder-o mr-2" aria-hidden="true"></i> Folders</h5>
                  </div>
                    <div class="box-body container text-dark">
                      <ul class="list-group">
                        <a class="nav-item active rounded bg p-1 pl-3 mb-0 text-left folder-list folder-class list-group-item border-0" data-toggle="list" data-folder="Institutional Records" data-folder_id="Institutional Records" href="javascript:void(0)">Institutional Records</a>
                        <a class="nav-item rounded bg p-1 pl-3 mb-0 text-left folder-list folder-class list-group-item border-0" data-toggle="list" data-folder="Employees Resume" data-folder_id="Employees Resume" href="javascript:void(0)">Employees' Resume</a>
                        <a class="nav-item rounded bg p-1 pl-3 mb-0 text-left folder-list folder-class list-group-item border-0" data-toggle="list" data-folder="Human Resource" data-folder_id="Human Resource" href="javascript:void(0)">Human Resource</a>
                      </ul>
                    </div>
                    <div class="card-header">
                      <h5><i class="fa fa-folder-o mr-2" aria-hidden="true"></i> Custom Folders</h5>
                      <button type="button" class="btn btn-mat waves-effect waves-light btn-success m-0 float-right mr-2 p-1 px-3 add_custom">+</button>
                    </div>
                    <div class="box-body container text-dark">
                      <ul class="list-group" id="tracking_tab" role="tablist">
                        <?php 
                          $sql = "SELECT * FROM document_folder WHERE NOT folder_archive=1 ";
                          $query = $conn->query($sql);
                          while ($row = $query->fetch_assoc()) {
                        ?>
                          <a class="nav-item rounded bg p-1 mb-0 pl-3 text-left folder-list folder-class list-group-item border-0" data-toggle="list" data-folder="<?php echo $row['folder_name']; ?>" data-folder_id="<?php echo $row['folder_id']; ?>" href="javascript:void(0)"><?php echo ucfirst(strtolower($row['folder_name'])); ?></a>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Document Body -->
                        
            </div>
            <!--Pcoded Inner COntent **end**-->
          </div>
          <!--Pcoded  COntent **end**-->
        </div>
      </div>
    </div>
  </div>


<?php 
  include 'includes/document_modal.php';
  include 'includes/document_request_modal.php';
  include 'includes/alert_modal.php';
  include 'includes/scripts.php';
?>   

<script>

var table_emp = $('#table1').DataTable({'order' : []});
var table_hr = $('#table2').DataTable({'order' : []});

//GET ALL FOLDER INFORMATIONS
function get_folder(folder_id){
  $.ajax({
    type: 'POST',
      url: 'function/folder_row.php',
      data: {folder_id:folder_id},
      dataType: 'json',
      success : function (response){
        //archive
        $('#del_folder_name').html(response.folder_name);
        $('#del_folder_date').html('Date Created : '+ new Date(response.folder_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
        // edit
        $('.edit_folder_id').val(folder_id);
        $('.edit_folder_name').val(response.folder_name);
        $('.edit_folder_details').val(response.folder_details);
      }
  });
}

//SET STATUS UNLOCK/LOCK DOCUMENT
function set_status(form_data,document_id){
  $.ajax({
    async:'false',
    type: 'POST',
    url: 'function/document_edit.php',
    data: form_data,
    dataType: 'json',
    success : function (response){
      if (response=='2') {
        $('#errorModal').modal('show');
        $('#error_msg').html('Document lock failed');
      }else if (response=='3') {
        $('#errorModal').modal('show');
        $('#error_msg').html('Invalid password, unlock attempt failed');
      } else{
        let status = (response=='1')? 'locked' :'unlocked';
        $('#successModal').modal('show');
        $('#success_msg').html('Document '+status+' successfully');
      }
      get_document(document_id);
    }
  });
  get_document(document_id);
  $('#lock_docu').modal('hide');
  $('#unlock_docu').modal('hide');
  $('#unlock_pass').val('');
}

//GET DOCUMENT INFORMATION
function get_document(document_id){

  //reset form
  $('#download').attr('download','');
  $('#download').attr('href','');
  $('#share').html('<i class="ti-share mx-3" ></i>Share');
  $('#share').addClass('bg-success');
  $('#share').addClass('text-white');
  $('#share').removeClass('bg-white');
  $('#share').removeClass('text-dark');
  $.ajax({
    type: 'POST',
      url: 'function/document_row.php',
      data: {document_id:document_id},
      dataType: 'json',
      success : function (response){
        // VARIABLES
        let ext = (response.document_file).split('.').pop();
        let folder = (response.folder_name==null)?response.document_folder:response.folder_name;
        let href = (response.document_type=='document')? "/Documents/index.php?document_id="+response.document_hash : response.document_file;

        // SET INFOS
        $('.view_upload_folder').val(folder);
        $('.select_upload_folder').val(response.document_folder);
        $('.view_upload_name').val(response.document_name);
        $('#view_upload_name').html(response.document_name);
        $('.view_upload_file').html("<a target='_blank' href='"+href+"'>"+response.document_file+"</a>");
        $('.view_upload_owner').val(response.document_owner);
        $('.view_upload_details').val(response.document_details);

        // CHANGE LABEL BASED ON TYPE
        if (response.document_type=='url') {
          // $('.view_upload_input').addClass('d-none');
          $('.label_docu').html('URL');
          $('#download').addClass('d-none');
          $('.view_upload_name').html('URL Name');
          $('.view_url_input').val(response.document_file);
          var domain ="";
        }else{
          // $('.view_upload_input').removeClass('d-none');
          $('.label_docu').html('File');
          $('.view_upload_name').html('Document Name');
          $('#download').removeClass('d-none');
          var domain ="localhost";
        }

        //document properties
        $('#starred').data('document_id',response.document_id);
        $('#starred').data('document_starred',response.document_starred);
        $('#edit_document_id').val(response.document_id);
        $('#download').attr('download',response.document_file);
        $('#download').attr('href',href);
        $('#share').attr('href',domain+href); //temporary -> localhost
        $('.docu_folder_id').val(response.document_id); //temporary -> localhost
        //lock
        $('.lock_folder_name').html(response.document_name); 
        $('.lock_folder_date').html('Date Created : '+ new Date(response.document_date).toLocaleString('en-us',{month:'long',year:'numeric', day:'numeric'})); 

        // STAR DESIGN
        if (response.document_starred=='1'){
          $('#star_icon').removeClass('fa-star-o').addClass('fa-star');
        }else{
          $('#star_icon').removeClass('fa-star').addClass('fa-star-o');
        }

        //HIDE EDIT PROPERTIES
        hide_edit();
        // IF 0 -> UNLOCK 2 -> LOCKED (HIDE DETAILS)
        set_lock(response.document_status);
        //SET DOCUMENT TYPE TO EDIT TO KNOW WHAT INPUT(TEXT/FILE) TO SHOW IN EDIT
        $('#edit_btn_docu').data('document_type',response.document_type);
        $('#cancel_btn_docu').data('document_id',response.document_id);

        // IMG DISPLAY
        const ext_dp = [
            ['docx', 'doc', 'docm', 'dot', 'docm', 'dotx'],
            ['pdf'],
            ['zip'],
            ['rar'],
            ['jpeg','jpg','png','gif'],
            ['xlsx','xlsm','xlsb','xltx']
        ];
        const doc_dp = ["word.png","pdf.png","zip.jpg","rar.png","img.png","excel.png"];
        let file_ext = (response.document_file).split('.').pop();
        var img_file ='';

        // CHECK FILE EXTENSION WHERE IT BELONG
        for (var i = 0; i < ext_dp.length; i++) {
          if (ext_dp[i].includes(file_ext)) {
            img_file = doc_dp[i];
            break;
          }
        }
        // IF NOT FOUND SET TO DEFAULT IMG BY DOCUMENT TYPE
        if (img_file=='') {
          if (response.document_type=='url') {
            img_file = 'url.jpg';
          }else{
            img_file = 'file.png';
          }
        }
        // SET IMG 
        $('#img_file').attr('src','../assets/images/document_dp/'+img_file);


      }
  });
}

//GET DOCUMENT LIST VIA DOCUMENT ID -> RELOAD DIV
async function document_list(folder_id){
  //LOADING WHILE SETTING UP
  $('#document_file').html('<img class="img-radius img-fluid mx-auto d-block p-4 w-50 mb-5" src="../assets/images/job_load.gif" />');
      $.ajax({
          async:'false',
          type: 'POST',
          url: 'function/document_row.php',
          data: {folder_id:folder_id},
          dataType: 'json',
          success : function (response){
            if (response=='1') {
              $("#document_file").load(location.href+" #document_file>*","");
              resolve(true);
            }else{
              resolve(false);
            }
          }
      });
}

//DOCUMENT SEARCH
async function document_search(folder_id,query){
  query = query.trim();
  $('#document_file').html('<img class="img-radius img-fluid mx-auto d-block p-4 w-50 mb-5" src="images/job_load.gif" />');
  let search = new Promise(function(resolve) {
    setTimeout(function() {
      $.ajax({
        async:'false',
        type: 'POST',
        url: 'function/document_row.php',
        data: {f_id:folder_id,query:query},
        dataType: 'json',
        success : function (response){
          if (response=='1') {
            $("#document_file").load(location.href+" #document_file>*","");
            resolve(true);
          }else{
            resolve(false);
          }
        }
      });
    }, 50);
  });

  let status = await search;
  if (status) {
    $('#search_document').addClass('search_document');
  }

}

// SET TITLE/DATA FOLDER ID/NAME 
function set_document_infos(folder_type,folder_id){
  $("#folder_title").html(folder_type);
  $(".folder_insert").data("folder_id",folder_id);
  $(".folder_insert").data("folder",folder_type);
  $("#search_document").data("folder_id",folder_id);
  $("#search_document").val('');
  // DISABLE EDIT IN FIX FOLDER
  if (folder_type=='Institutional Records' || folder_type=='Employees Resume' || folder_type=='Human Resource') {
    $('#edit_folder').addClass("d-none");
    $('.del_fold').addClass("d-none");
    $('#folder_view_btn').addClass("d-none");
  }else{
    $('#edit_folder').removeClass("d-none");
    $('.del_fold').removeClass("d-none");
    $('#folder_view_btn').removeClass("d-none");
  }
}

function set_lock(status){
  // IF 0 -> UNLOCK 1 -> LOCKED (HIDE DETAILS)
  
  if (status==1) {
    $('#share').addClass('d-none');
    $('#lock').addClass('d-none');
    $('#edit_btn_lock').addClass('d-none');
    $('#unlock').removeClass('d-none');   
    $('#edit_btn_docu').addClass('d-none');    
  }else{
    $('#share').removeClass('d-none');
    $('#lock').removeClass('d-none');
    $('#unlock').addClass('d-none');
    $('#edit_btn_lock').removeClass('d-none');
    $('#edit_btn_docu').removeClass('d-none');    
  }
}

// SHOW EDIT PROPERTIES
function show_edit(type){
  //buttons
  $('#cancel_btn_docu').removeClass('d-none');
  $('#save_btn_docu').removeClass('d-none');
  $('#edit_btn_docu').addClass('d-none');
  //inputs
  $('#view_upload_label').addClass('d-none');
  $('#input_upload_name').removeClass('d-none');
  $('#view_upload_folder').addClass('d-none');
  $('#edit_upload_folder').removeClass('d-none');
  $('.view_upload_file').addClass('d-none');
  $('.view_upload_owner').attr('readonly',false);
  $('.view_upload_owner').attr('placeholder','(Optional)');
  $('.view_upload_details').attr('readonly',false);

  if (type=='url') {
    $('.view_upload_input').addClass('d-none');
    $('.view_upload_input').attr('required',false);
    $('.view_url_input').removeClass('d-none');
    $('#file_info_change').addClass('d-none');
  }else{
    $('.view_upload_input').removeClass('d-none');
    $('.view_url_input').attr('required',false);
    $('.view_url_input').addClass('d-none');
    $('#file_info_change').removeClass('d-none');
  }
  
}

// HIDE EDIT PROPERTIES
function hide_edit(){
  $('#cancel_btn_docu').addClass('d-none');
  $('#save_btn_docu').addClass('d-none');
  $('#edit_btn_docu').removeClass('d-none');
  //inputs
  $('#view_upload_label').removeClass('d-none');
  $('#input_upload_name').addClass('d-none');
  $('#view_upload_folder').removeClass('d-none');
  $('#edit_upload_folder').addClass('d-none');
  $('.view_upload_file').removeClass('d-none');
  $('.view_upload_input').addClass('d-none');
  $('.view_url_input').addClass('d-none');
  $('.view_upload_owner').attr('placeholder','N/A');
  $('.view_upload_owner').attr('readonly',true);
  $('.view_upload_details').attr('readonly',true);
  $('#file_info_change').addClass('d-none');
}

// GET REQUEST INFO HR 
function get_request_info(request_by,table){
  table.clear().draw();
  $.ajax({
    async:'false',
    type: 'POST',
    url: 'function/document_request_row.php',
    data: {request_by:request_by},
    dataType: 'json',
    success : function (response){
      if (response.length==0) {
        if (request_by=='employee') {
          $('#emp_request_table').addClass('d-none');
          $('#no_emp_request').removeClass('d-none');
        }else{
          $('#hr_request_table').addClass('d-none');
          $('#no_hr_request').removeClass('d-none');
        }
      }else{
        if (request_by=='employee') {
          $('#emp_request_table').removeClass('d-none');
          $('#no_emp_request').addClass('d-none');
        }else{
          $('#hr_request_table').removeClass('d-none');
          $('#no_hr_request').addClass('d-none');
        }
        for (var i = 0; i < response.length; i++) {
          let emp_name = (response)[i].firstname+' '+(response)[i].middlename+' '+(response)[i].lastname;
          let view_req = 'view_areq';
          let id =(response)[i].reference_id;
          let status=set_req_status((response)[i].request_status);
          let delete_btn='';
          let badge = 'badge-warning';
          //let edit_btn = '<button class="btn btn-success btn-sm edit_areq btn-round mx-1" data-id="'+id+'"><i class="fa fa-edit"></i> Edit</button>';

          let edit_btn = '<div class="dropdown-divider"></div><a class="dropdown-item edit_areq" href="javascript:void(0)" data-id="'+id+'"><i class="fa fa-edit"></i>Edit</a>';

          if (status=='Pending') {
            //delete_btn = '<button class="btn btn-danger btn-sm delete_areq btn-round" data-id="'+id+'"><i class="fa fa-trash"></i> Delete</button>';
            delete_btn = '<div class="dropdown-divider"></div><a class="dropdown-item delete_areq text-danger" href="javascript:void(0)" data-id="'+id+'"><i class="fa fa-trash"></i>Delete</a>';
          }
          if (status=='Validated') {
            edit_btn ='';
            badge = 'badge-success';
          }else if(status=='Document sent'){
            badge = 'badge-info';
          }else if(status=='Rejected'){
            badge = 'badge-danger';
          }
          if (request_by=='employee') {
            delete_btn='';
            edit_btn='';
            view_req = 'view_ereq';
          }
          table.row.add( [
            (response)[i].reference_id,
            (response)[i].request_name,
            emp_name,
            '<span class="badge '+badge+'">'+status+'</span>',
            ` <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
            </button>
            <div class="dropdown-menu" style="">
              <a class="dropdown-item ${view_req}" href="javascript:void(0)" data-id="${id}"><i class="fa fa-eye"></i>Review</a>`+edit_btn+delete_btn+
            `</div>`
             //'<button class="btn btn-warning btn-sm '+view_req+' text-dark btn-round" data-id="'+id+'"><i class="fa fa-eye"></i> Review</button>'+edit_btn+delete_btn
          ] ).draw();
        }
      }
    }
  });
}

function set_req_status(status){
  if (status==0) {
    status ='Pending';
  }else if (status==1) {
    status ='Document sent';
  }else if (status==2) {
    status ='Rejected';
  }else{
    status ='Validated';
  }
  return status;
}

function get_request(reference_id){
  $('#review_emp_req_form')[0].reset();
  $.ajax({
    type: 'POST',
    url: 'function/document_request_row.php',
    data: {request_id:reference_id},
    dataType: 'json',
    success : function (response){
      //default
      $('.request_file').html('No Uplaoded File');
      $('.request_file').attr('href','#');
      //employee request (default)
      $('.view_request_file').html('No uploaded file');
      $('.view_request_file').attr('href','#');
      $('.view_request_file').attr('target','');

      // PROPERTIES
      if (response.request_status==0) {
        $('.replied').addClass('d-none');
        $('.request_file_upload').attr('required',true);
      }else{
        $('.request_file_upload').attr('required',false);
        $('.replied').removeClass('d-none');
        if(response.request_file!=null){
          $('.view_request_file').attr('target','_blank');
          $('.view_request_file').html(response.request_file);
          $('.view_request_file').attr('href','/Documents/request/?reference_id='+response.file_hash);
        }
        

        if (response.request_status==2 || response.request_status==3) {
          $('.rej_btn').addClass('d-none');
        }
        if (response.request_status==3 ) {
          $('.val_btn').addClass('d-none');
        }
      }

      //view
      $('.view_request_status').val(set_req_status(response.request_status));
      $('.view_request_comment').val(response.request_comment);
      $('.request_file').html(response.request_file);
      $('.request_file').attr('href','/Documents/request/index.php?reference_id='+response.file_hash);

      //view employee
      $('.view_request_date').val(new Date(response.request_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
      $('.edit_reply').addClass('d-none');
      $('.edit_btn').removeClass('d-none');
      $('.edit_btn').data('status',response.request_status);
      $('#cancel_edit').data('id',reference_id);

      //properties
      $('.view_request_comment').attr('readonly',true);
      $('.view_request_file').removeClass('d-none');
      $('.request_file_upload').addClass('d-none');
      $('#file_request_change').addClass('d-none');
      

      //edit
      $('.req_ref_id').val(reference_id);
      $('.req_ref_file').val(response.request_file);
      $('.view_request_name').val(response.request_name);
      $('.view_request_employee').val(response.employee_id);
      $('.view_request_employee_name').val(response.firstname +' '+response.lastname);
      $('.view_request_details').val(response.request_note);

      //cancel
      $('.req_name_cancel').html(response.request_name);
      $('.req_date_cancel').html(new Date(response.request_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));

    }
  });
}

// SET REQUEST TO REJECTED
function set_request_reject(reference_id){
  $.ajax({
    type: 'POST',
    url: 'function/document_request_edit.php',
    data: {reject_id:reference_id},
    dataType: 'json',
    success : function (response){
      if (response=='0') {
        $('#errorModal').modal('show');
        $('#error_msg').html('Document reject failed');
      } else{
        $('#successModal').modal('show');
        $('#success_msg').html('Document rejected successfully');
      }
      $('#admin_request_review').modal('hide'); 
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


  $(document).on('click','#archiveSubmit', function (e) {
    localStorage.removeItem("folder_id_session");
    localStorage.removeItem("folder_type_session");
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

  // RELOAD DOCUMENTS
  $(document).on('click','.reload_documents', function (e) {
    e.preventDefault();
    let folder_id = $(".folder_insert").data("folder_id");
    document_list(folder_id);
    $("#search_document").val('');
  });

  //DOCUMENT SEARCH
  $(document).on('keyup','.search_document', function (e) {
    let folder_id = $('#search_document').data("folder_id");
    let query = $('#search_document').val();
    //remove for a moment to avoid type spam : )
    $('#search_document').removeClass('search_document');
    document_search(folder_id,query);
  });

  // ADD CUSTOM FOLDER
  $(document).on('click','.add_custom', function (e) {
    e.preventDefault();
    $("#add_custom").modal('show');
  });

  // EDIT CUSTOM FOLDER
  $(document).on('click','#edit_folder', function (e) {
    e.preventDefault();
    let folder_id = $(this).data("folder_id");
    $("#edit_custom").modal('show');
    get_folder(folder_id);
  });

  // ARCHIVE FOLDER
  $(document).on('click','#del_folder', function (e) {
    e.preventDefault();
    let folder_id = $(this).data("folder_id");
    $("#archive_custom").modal('show');
    get_folder(folder_id);
  });

  // UPLOAD DOCUMENT
  $(document).on('click','#upload_docu', function (e) {
    e.preventDefault();
    let folder_id = $(this).data("folder_id");
    let folder = $(this).data("folder");
    $('.add_docu_folder').html(folder);
    $('#add_docu_folder_id').val(folder_id);
    $("#uploadModal").modal('show');
    $("#add_docu_form")[0].reset();  
  });

  // ADD URL
  $(document).on('click','#add_url', function (e) {
    e.preventDefault();
    let folder_id = $(this).data("folder_id");
    let folder = $(this).data("folder");
    $('.add_url_folder').html(folder);
    $('#add_url_folder_id').val(folder_id);
    $("#addURL").modal('show');
    $("#add_url_form")[0].reset(); 
  });

  //DPCUMENT PROPERTIES
  $(document).on('click','.document_uploads', function (e) {
    let document_id = $(this).data("id");
    $("#viewUpload").modal('show');
    get_document(document_id);
    //default style
    $('#share').html('<i class="ti-share mx-3" ></i>Share');
    $('#share').removeClass('bg-white');
    $('#share').removeClass('text-black');
    $('#share').addClass('bg-success');
    $('#share').addClass('text-white');
  });

  //NAV ITEM SET ACTIVE
  $(document).on('click','.list-group .nav-item', function (e) {
    e.preventDefault();
    $('.list-group .nav-item').removeClass("active");
    $(this).addClass("active");
  });


  //SHARE FILE/URL
  // $('.share').tooltip({title: "Link Copied!", trigger: "click"});
  $(document).on('click', '#share', function(e) {
    e.preventDefault();
    var copyText = $(this).attr('href');
    document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
    }, true);
    document.execCommand('copy');  
    $('#share').html('<i class="ti-pin-alt mx-3" ></i>Link Copied');
    $('#share').removeClass('bg-success');
    $('#share').removeClass('text-white');
    $('#share').addClass('bg-white');
    $('#share').addClass('text-black');
  });

  //SET TIMEOUT TO DOWNLOAD
  $(document).on('click', '.download', function(e) {

    // GET DETAILS
    let dl = $(this).attr('download');
    let href = $(this).attr('href');
    $(this).removeClass('download');
    $(this).html('<span class="spinner mx-3"></span>');

    // REMOVE ATTR FOR A MOMENT JUST TO TRIGGER DOWNLOAD
    setTimeout(function(){ 
      $('#download').removeAttr('download');
      $('#download').removeAttr('href');
    }, 100);

    // SET VALUE AGAIN AFTER 5 SECS TO AVOID DL -> SPAMMING
    setTimeout(function(){ 
      $('#download').html('<i class="fa fa-download mx-3" ></i>Download');
      $('#download').attr('download',dl);
      $('#download').attr('href',href);
      $('#download').addClass('download');
    }, 5000);

  });


  // SUBMIT LOCK
  $(document).on('submit', '#lockForm', function(e) {
    e.preventDefault();
    let form_data = $('#lockForm').serialize();
    let document_id = $('.docu_folder_id').val();
    set_status(form_data,document_id);
  });

  // UNLOCK FORM SUBMIT
  $(document).on('submit', '#unlockForm', function(e) {
    e.preventDefault();
    let form_data = $('#unlockForm').serialize();
    let document_id = $('.docu_folder_id').val();
    set_status(form_data,document_id);
  });

  // EDIT DOCUMENT
  $(document).on('click', '#edit_btn_docu', function(e) {
    e.preventDefault();
    let document_type = $(this).data('document_type');
    show_edit(document_type);
  });

  // CANCEL EDIT
  $(document).on('click', '#cancel_btn_docu', function(e) {
    e.preventDefault();
    let document_id = $(this).data('document_id');
    $('#edit_docu_form')[0].reset();
    get_document(document_id);
  });

  // VIEW FOLDER
  $(document).on('click', '#folder_view_btn', function(e) {
    e.preventDefault();
    let folder_id = $(this).data('folder_id');
    get_folder(folder_id)
  });

  // REFRESH 
  $(document).on('click', '.close_docu', function(e) {
    e.preventDefault();
    let folder_id =$(this).data('folder_id');
    document_list(folder_id);
  });

  // DELETE TROJAN SLIDE 
  $(document).on('click', '.req_tab', function(e) {
    e.preventDefault();
    $('.trojan_slide').remove();
  });

  // REQ BTN
  $(document).on('click', '#req_btn', function(e) {
    e.preventDefault();
    get_request_info('admin',table_hr);
    get_request_info('employee',table_emp);
  });



  // STARRED 
  $(document).on('click', '#starred', function(e) {
    e.preventDefault();
    let document_id =$(this).data('document_id');
    let document_starred =$(this).data('document_starred');
    $.ajax({
      async:'false',
      type: 'POST',
      url: 'function/document_edit.php',
      data: {document_starred:document_starred,document_id_starred:document_id},
      dataType: 'json',
      success: function(response){
        if (response=='1'){
          $('#star_icon').removeClass('fa-star-o').addClass('fa-star');
        }else{
          $('#star_icon').removeClass('fa-star').addClass('fa-star-o');
        }
        $('#starred').data('document_starred',response);
      }
    });
  });

  // ADMIN REQUEST FORM 
  $(document).on('submit', '#admin_request_form', function(e) {
    e.preventDefault();
    let form_data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'function/document_request_add.php',
      data: form_data,
      dataType: 'json',
      success : function (response){
        if (response=='1') {
          $('#successModal').modal('show');
          $('#success_msg').html('Document request sent successfully');
        }else{
          $('#errorModal').modal('show');
          $('#error_msg').html('Document request failed');
        }
        $('#admin_request').modal('hide');
        get_request_info('admin',table_hr);
      }
    });
  });

  // EDIT ADMIN REQUEST FORM 
  $(document).on('click', '.edit_areq', function(e) {
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $('#admin_request_edit').modal('show');
  });


  // VIEW ADMIN REQUEST FORM 
  $(document).on('click', '.view_areq', function(e) {
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $('#admin_request_review').modal('show');
  });

  // VIEW EMPLOYEE REQUEST FORM 
  $(document).on('click', '.view_ereq', function(e) {
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $('#employee_request_review').modal('show');
  });

  // ADMIN EDIT REQUEST FORM 
  $(document).on('submit', '#admin_edit_request_form', function(e) {
    e.preventDefault();
    let form_data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'function/document_request_edit.php',
      data: form_data,
      dataType: 'json',
      success : function (response){
        if (response=='1') {
          $('#successModal').modal('show');
          $('#success_msg').html('Document request updated successfully');
        }else{
          $('#errorModal').modal('show');
          $('#error_msg').html('Document request updated failed');
        }
        $('#admin_request_edit').modal('hide');
        get_request_info('admin',table_hr);
      }
    });
  });

  // DELETE ADMIN REQUEST FORM 
  $(document).on('click', '.delete_areq', function(e) {
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
    $('#cancelreq').modal('show');
  });

  // ADD REQUEST -> RESET FORM
  $(document).on('click', '#add_doc_req', function(e) {
    e.preventDefault();
    $('#admin_request_form')[0].reset();
  });

  // ADMIN EDIT REQUEST FORM 
  $(document).on('submit', '#admin_cancel_request_form', function(e) {
    e.preventDefault();
    let form_data = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'function/document_request_delete.php',
      data: form_data,
      dataType: 'json',
      success : function (response){
        if (response=='1') {
          $('#successModal').modal('show');
          $('#success_msg').html('Document request cancelled successfully');
        }else{
          $('#errorModal').modal('show');
          $('#error_msg').html('Document request cancellation failed');
        }
        $('#cancelreq').modal('hide');
        get_request_info('admin',table_hr);
      }
    });
  });

  // VALIDATE OR REJECT DOCUMENT SENT BY EMPLOYEE
  $(document).on('click', '.status_btn', function(e) {
    e.preventDefault();
    let status = $(this).data('status');
    let reference_id = $('#reference_id_admin').val();
    if (status=='reject') {
      set_request_reject(reference_id);
    }else{
      $('#validateSave').modal('show');
    }
    get_request(reference_id);
    get_request_info('admin',table_hr);

  });

  //EDIT BTN -> SHOW SAVE AND CANCEL
  $(document).on('click','.edit_btn', function(e){
    e.preventDefault();
    let status = $(this).data('status');
    if (status==0 || status==2) {
        $('#file_request_change').addClass('d-none');
    }else{
        $('#file_request_change').removeClass('d-none');
    }
    $('.edit_reply').removeClass('d-none');
    $(this).addClass('d-none');
    $('.view_request_comment').attr('readonly',false);
    $('.view_request_file').addClass('d-none');
    $('.request_file_upload').removeClass('d-none');
  });//**end**

  //CANCEL EDIT
  $(document).on('click','#cancel_edit', function(e){
    e.preventDefault();
    let reference_id = $(this).data('id');
    get_request(reference_id);
  });//**end**

  //SUBMIT REPLY (EMPLYOEE REQUEST)
  $(document).on('submit','#review_emp_req_form', function(e){
    e.preventDefault();
    let status = $('#req_stat').val(); 
    let valid = true;
    if (status=='Rejected') {
      if ($('#emp_file').val()=='') { valid = false;}
    }


    if(valid){
      let form_data = new FormData($(this)[0]); 
      $.ajax({
        type:'POST',
        url:'function/document_request_edit.php',
        cache: false,
        contentType: false,
        processData: false,
        data:form_data,
        dataType:'json',
        success : function(response){
          if (response=='1') {
            $('#successModal').modal('show');
            $('#success_msg').html('Document sent successfully');
          }else{
            $('#errorModal').modal('show');
            $('#error_msg').html('Document send failed');
          }
          get_request_info('employee',table_emp);
          $('#employee_request_review').modal('hide');
        }
      });
    }else{
      $('#errorModal').modal('show');
      $('#error_msg').html('Upload a file first');
    }
  });//**end**

  //SUBMIT REPLY (EMPLYOEE REQUEST)
  $(document).on('click','.rej_btn', function(e){
    e.preventDefault();
    let reference_id = $('#cancel_edit').data('id');
    let comment = $('#comment_req').val();;
    $.ajax({
      type:'POST',
      url:'function/document_request_edit.php',
      data:{reject_id:reference_id,reject_comment:comment},
      dataType:'json',
      success : function(response){
        if (response=='1') {
          $('#successModal').modal('show');
          $('#success_msg').html('Document request rejected');
        }else{
          $('#errorModal').modal('show');
          $('#error_msg').html('Document reject failed');
        }
        get_request_info('employee',table_emp);
        $('#employee_request_review').modal('hide');
      }
    });
  });//**end**

});
</script>

</body>
</html>

