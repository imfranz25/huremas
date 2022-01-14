<?php 
$title ="Benefits";
include 'includes/session.php';
include 'includes/header.php';
?>
  <body>
  <?php include 'includes/preloader.php'; ?>
  
  <div id="pcoded" class="pcoded">
      
        <div class="pcoded-overlay-box"></div>
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
                                          <h5 class="m-b-10">Benefits</h5>
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
                                          <li class="breadcrumb-item"><a href="#!">Benefits</a>
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
                            <div class="card-header">     
                                <h5>
                                  <a type="button" class="btn btn-default">
                                    Benefits List</a> 
                                </h5>
                                <button type="button" class="btn btn-mat waves-effect waves-light btn-success float-right" data-toggle="modal" data-target="#addnew"><i class="fa fa-plus"></i>New</button>
                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                    <th>Benefit ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM benefits";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                        ?>

                                            <tr>
                                            <td><?php echo $row['benefit_id']; ?></td>
                                            <td><?php echo $row['benefit_name']; ?></td>
                                            <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 290px;'>
                                            <a href='#view_desc' data-toggle='modal' class='pull-right desc' data-id='<?php echo $row['id']; ?>'><span class='fa fa-eye mx-2'></span></a>
                                            <?php echo $row['description']; ?>     
                                            </td>
                                            <td>

                                                 <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                                                </button>

                                                <div class="dropdown-menu" style="">
                                                  <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i>Delete</a>
                                                </div>

                                            </td>
                                            </tr>
                                         <?php } ?>
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

    <?php include 'includes/benefit_modal.php'; ?>

    <?php include 'includes/scripts.php'; ?>

    
    <script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.desc').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'function/benefits_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#beneid').val(response.id);
      $('.edit_title').val(response.benefit_name);
      $('.edit_description').val(response.description);
      $('#del_beneid').val(response.id);
      $('#del_benefit').html(response.benefit_name);
      $('#view_benefit').html(response.description);
      $('.view_title').html(response.benefit_name);
    }
  });
}


$(document).ready(function() {
    $('#table1').DataTable();
} );
</script>

</body>
</html>


