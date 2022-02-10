<?php 
  $title ="Overtime";
  require_once '../includes/path.php';
  require_once 'includes/session.php';
  require_once 'includes/header.php';
?>

<body>
  <?php include_once 'includes/preloader.php'; ?>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-container navbar-wrapper">         
      <?php require_once 'includes/navbar.php'?>
      <?php require_once 'includes/sidebar.php'?>
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
                  <li class="breadcrumb-item"><a href="#!">Employee</a></li>
                  <li class="breadcrumb-item"><a href="overtime.php">Overtime</a></li>
                  <li class="breadcrumb-item">
                    <a href="overtime_category.php">Overtime Category</a>
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
          <?php include_once 'includes/session_alert.php'; ?>           
          <!-- Main-body start -->
          <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#addOT"><i class="fa fa-plus"></i>New</button>
          <a href="overtime.php" style="float:right;">
            <button type="button" class="btn btn-mat waves-effect waves-light btn-success" ><i class="fa fa-chevron-left"></i>Back</button>
          </a>
          <div class="card">
            <div class="card-header">
              <h5>Overtime List</h5>
            </div>
            <div class="box-body">
              <div class="card-block table-border-style">
                <div class="table-responsive">
                  <table id="table1" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Overtime Name</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      <?php
                        $sql = "SELECT * FROM overtime";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                      ?>
                      <tr>
                        <td><?php echo ucfirst($row['overtime_name']); ?></td>
                        <td><?php echo $row['overtime_rate']; ?>%</td>
                        <td><?php echo ucfirst($row['status']); ?></td>
                        <td>
                          <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                          </button>
                          <div class="dropdown-menu" style="">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i>Delete</a>
                          </div>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php include 'includes/overtime_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>

    

<script>

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

    $(document).on('click','.edit',function(e){
      e.preventDefault();
      $('#updateOT').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click','.delete',function(e){
      e.preventDefault();
      $('#deleteOT').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click','[data-hide]',function(e){
      $("#showdanger").attr('hidden',true);
    });

    // to avoid the re-initialization of datatable
    if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
      $('#table1').DataTable();
    }//**end**

    //select all
    $(document).on('click','#globalcheck',function(e){
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
    $(document).on('click','#deleteAll',function(e){
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

  });
</script>

</body>
</html>

