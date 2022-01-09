<?php 
$title ="Overtime";
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
                                          <h5 class="m-b-10">Overtime Category</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Employee</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="overtime.php">Overtime</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Overtime Category</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">

                          <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
                            <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-warning'></i> Note !</h4>
                             <label id="warning"></label>
                          </div>

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

                            <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addOT"><i class="fa fa-plus"></i>New</button>
                            <button type="button" class="btn btn-mat waves-effect waves-light btn-danger" data-toggle="modal" id="deleteAll"><i class="fa fa-trash"></i>Delete</button>

                            <a href="overtime.php" style="float:right;">
                            <button type="button" class="btn btn-mat waves-effect waves-light btn-success" ><i class="fa fa-chevron-left"></i>Back</button></a>

                            

                            <div class="card">
                            <div class="card-header">
                                                <h5>Overtime List</h5>
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
                                        <th  width="5%">
                                          <div class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input" id="globalcheck" />
                                            <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck">&nbsp;</label>
                                          </div>
                                        </th>
                                        <th>Overtime Name</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    <?php
                                        $sql = "SELECT * FROM overtime";
                                        $query = $conn->query($sql);
                                        while($row = $query->fetch_assoc()){
                                        ?>
                                            <tr>
                                              <td>
                                                <div class="custom-control custom-checkbox m-0 p-0">
                                                  <input type="checkbox" class="custom-control-input toggle-check" data-id="<?php echo $row['id']; ?>" id="<?php echo $row['id']; ?>" />
                                                  <label class="custom-control-label d-flex align-items-center" for="<?php echo $row['id']; ?>">&nbsp;</label>

                                                </div>
                                              </td>
                                              <td><?php echo ucfirst($row['overtime_name']); ?></td>
                                              <td><?php echo $row['overtime_rate']; ?>%</td>
                                              <td><?php echo ucfirst($row['status']); ?></td>
                                              <td>
                                                  <button class="btn btn-success btn-sm edit btn-round" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                                  <button class="btn btn-danger btn-sm delete btn-round" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                      <?php }?>
                                      </tbody>
                                </table>
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

    <?php include 'includes/overtime_modal.php'; ?>

    <?php include 'includes/scripts.php'; ?>

    

<script>

$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#updateOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#deleteOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $("[data-hide]").on("click", function(){
      $("#showdanger").attr('hidden',true);
    });
});


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/overtime_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $('#overtime_title').html("Delete Record");
      $('#overtime_id').val(response.id);
      $('#overtime_name').html(response.overtime_name);
      //edit
      $('#edit_status').prop('checked', response.status == "active");
      $('#edit_name').val(response.overtime_name);
      $('#edit_rate').val(response.overtime_rate); 
      $('#edit_percent').html(response.overtime_rate); 
      $('#OT_id').val(response.id);
    }
  });
}


$(document).ready(function() {

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
    $('#table1').DataTable();
  }//**end**

  //select all
  $('#globalcheck').click(function(e){
    if(this.checked) {
      $(':checkbox').each(function() {
        this.checked = true;                        
      });
    }else {
      $(':checkbox').each(function() {
        this.checked = false;                       
      });
    }
  });

  //delete all checked checkbox :)
  $('#deleteAll').click(function(e){
    //select all checked checkbox
    var ids = $("#tbody input:checkbox:checked").map(function(){
      return $(this).attr("id");
    }).get();

    if (ids.length){
      $.ajax({
        type: 'POST',
        url: 'function/overtime_row.php',
        data: {ids:ids},
        dataType: 'json',
        success: function(response){
          $("#deleteOT").modal('show');
          $("#overtime_title").html("Delete Record(s)");
          $("#overtime_name").html((response.length <= 1) ? response.join(", ") : response.slice(0, -1).join(", ")+", and "+response[response.length-1]);
          $("#overtime_id").val(ids);
        }
      });
    }else{
      $("#showdanger").removeAttr("hidden");
      $("#warning").html("Please select overtime record first !");
    }


  });
  


} );
</script>

</body>
</html>

