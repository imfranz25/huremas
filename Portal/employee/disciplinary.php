<?php 
$title ="Disciplinary";
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
                                          <h5 class="m-b-10">Disciplinary</h5>
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
                                          <li class="breadcrumb-item"><a href="disciplinary.php">Disciplinary</a>
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
                            



                            <div class="card-header">
                                                <h5>Disciplinary Action List</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Issued</th>
                                        <th>Reason</th>
                                        <th>Internal Note</th>
                                        <th>State</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $id = $user['employee_id'];
                                            $sql = "SELECT * FROM disciplinary_action LEFT JOIN disciplinary_category ON disciplinary_category.id=disciplinary_action.reason WHERE disciplinary_action.employee_id = '$id' ORDER BY disciplinary_action.reason DESC ";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                            ?>
                                                <tr>

                                                    <td><?php echo $row['reference_id']; ?></td>
                                                    <td><?php echo (new DateTime($row['issued_date']))->format('F d, Y'); ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                                                        <a href='#view_action' data-toggle='modal' class='pull-right view_DA' data-id='<?php echo $row['reference_id']; ?>'><span class='fa fa-eye ml-5'></span></a>
                                                        <?php echo $row['internal_note']; ?>
                                                    </td>
                                                    <td><?php echo $row['state']; ?></td>
                                                    <td class="d-flex justify-content-center">
                                                        <button class='btn btn-success btn-sm mr-1 edit_DA btn-round' data-id='<?php echo  $row['reference_id']; ?>'><i class='fa fa-edit'></i> Review</button>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                        </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                               





                          </div>
                        </div>     


                             <!-- Main-body end -->
                  </div>
              </div>
        </div>
    </div>
   

    <?php require_once 'includes/disciplinary_modal.php'; ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/alert_modal.php"); ?>
    <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/scripts.php"); ?>

    
    <script>
$(function(){

  //DISCIPLINARY PROPERTIES
  $('.edit_DA').click(function(e){
    e.preventDefault();
    $('#employee_action').modal('show');
    var id = $(this).data('id');
    DA_row(id);
    //set to first tab and tabpane
    $('.first_tab').trigger('click')
  });
  $('.view_DA').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    DA_row(id);
    //set to first tab and tabpane
    $('.first_tab').trigger('click')
  });

});


function DA_row(id){

  $.ajax({
    type: 'POST',
    url: '/HUREMAS/Portal/admin/function/disciplinaryA_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //edit
      $('#reference_DA').val(response.reference_id);
      $('.date_DA').val(new Date(response.issued_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
      $('.reason_DA').val(response.title);
      $('.description_DA').val(response.internal_note);
      //action
      $('.action_DA').val(response.action);
      $('.action_details_DA').val(response.action_details);
      $('.explain_DA').val(response.explanation);
      //attachment link
      $('.attachment_link_DA').html('');
      if (response.attachment!='') {
        $('.attachment_link_DA').html('<i class="fa fa-paperclip mr-2"></i><label style="cursor: pointer;"><a target="_blank" href="/HUREMAS/Portal/admin/uploads/disciplinary/'+response.attachment+'" class="attachment_DA">'+response.attachment+'</a></label>');
      }else{
        $('.attachment_link_DA').html('<label><a href="javascript:void(0)">No Attachment</a></label>');
      }

      //dynamic tabs (reset and append via state)
      $('.state_tab').html('<li class="nav-item"><a class="nav-link active first_tab" data-toggle="tab" href="#er">Employee Response</a></li>');
      $('.state_tab_view').html('<li class="nav-item"><a class="nav-link active first_tab" data-toggle="tab" href="#er_view">Employee Response</a></li>');

      //show other tabs
      if (response.state =='Reviewed') {
          $('.state_tab').append('<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ad">Action Details</a></li>');
          $('.state_tab_view').append('<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ad_view">Action Details</a></li>');
      }
      

    }
  });

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

//CHECK IF FILE IS VALID (RESUME)
function check_attachment(file_input) {
  //valid extension
  const valid_attachment = ['pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx']; 
  check_file(file_input,valid_attachment);
  return true;
} 



$(document).ready(function() {

  // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
  $('body').on('hidden.bs.modal', function () {
    if($('.modal.show').length > 0){
      $('body').addClass('modal-open');
    }
  });

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' )) {
    $('#table1').dataTable( {
      "order": [],
    });
  }//**end**


  // ensure that the other tab pane is hidden when the other one is shown :)
  $('.nav-tabs a').on('shown.bs.tab', function(){
    var activeTab = $(this).attr('href');
    (activeTab === "#dipC") ? ($("#dipC").show(),$("#dipA").hide()) : ($("#dipC").hide(),$("#dipA").show());
  });//**end**

});




</script>

</body>
</html>


