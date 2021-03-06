<?php 
  $title ="Users"; 
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
              <div class="pcoded-content">
                <!-- Page-header start -->
                <div class="page-header">
                  <div class="page-block">
                    <div class="row align-items-center">
                      <div class="col-md-8">
                        <div class="page-header-title">
                          <h5 class="m-b-10">Users</h5>
                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <ul class="breadcrumb-title">
                          <li class="breadcrumb-item">
                            <a href="index.php"> <i class="fa fa-home"></i></a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="users.php">Others</a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="users.php">Users</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Page-header end -->

                <div class="pcoded-inner-content">
                  <!-- JS ALERTS -->
                  <div class='alert alert-danger alert-dismissible' hidden="" id="showdanger">
                    <button type='button' class='close' data-hide='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-warning'></i> Note !</h4>
                    <label id="warning"></label>
                  </div>
                  <!-- SESSION ALERTS -->
                  <?php include_once 'includes/session_alert.php'; ?>   
                       
                  <!-- Main-body start -->
                  <div class="card">
                    <div class="card-header">
                      <h5>
                        <a type="button" class="btn btn-mat waves-effect waves-light btn-default">Users List</a>
                      </h5>
                      <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addUsers">
                        <i class="fa fa-plus"></i>New
                      </button>                          
                    </div>
                  <div class="box-body">
                    <div class="card-block table-border-style">
   
                      <div class="table-responsive">
                        <table id="table1" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th>Employee ID</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>E-mail</th>
                              <th>User Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbody">
                            <?php
                              $count=0;
                              $sql = "SELECT a.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,a.id as aid,e.email FROM admin a inner join employees e on a.employee_id=e.employee_id";
                              $query = $conn->query($sql);
                              while($row = $query->fetch_assoc()){
                                $count++;
                            ?>
                            <tr>
                              <td class="text-center"><?php echo $count; ?></td>
                              <td><?php echo $row['employee_id']; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['type']; ?></td>
                              <td class="text-center">
                                <?php if($row['aid']!='1'){ ?>
                                  <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    Action
                                  </button>
                                  <div class="dropdown-menu" style="">
                                    <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['aid'] ?>">
                                      <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['aid'] ?>"><i class="fa fa-trash"></i>Delete</a>
                                  </div>
                                 <?php } ?>
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

  <?php include 'includes/users_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>

<script>

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/users_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $('#deleteid').val(response.aid);
      $('#username_delete').html(response.username);

      //edit
      $('#aid').val(response.aid);
      $('#name_edit').val(response.name);
      $('#user_type').val(response.type);
      $('#username_edit').val(response.username);
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

  $(document).on('click','.edit',function(e){
    e.preventDefault();
    $('#Edit_user').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click','.delete',function(e){
    e.preventDefault();
    $('#deleteOT').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $("[data-hide]").on("click", function(){
    $("#showdanger").attr('hidden',true);
  });

   $('#employee_id').change(function () {
    var ln = $(this).find(':selected').data('ln');
    var fn = $(this).find(':selected').data('fn');
    var ls = $(this).val();
    ln = ln.replace(/\s+/g, '');
    fn = fn.replace(/\s+/g, '');
    $('#username').val(ln.toLowerCase()+"."+fn.toLowerCase()+"_"+ls.substring(12));
  });

});

</script>

</body>
</html>

