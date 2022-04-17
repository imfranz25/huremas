<?php 
  $title ="Benefits";
  require_once '../includes/path.php';
  require_once("../admin/includes/session.php");
  require_once("../admin/includes/header.php");
?>

<body>
  <?php include_once("../admin/includes/preloader.php");  ?>
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
                  <h5 class="m-b-10">Benefits</h5>
                  <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                </div>
              </div>
              <div class="col-md-4">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="index.php"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="benefits.php">Benefits</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Page-header end -->

        <div class="pcoded-inner-content">
          <?php include_once '../admin/includes/session_alert.php'; ?>         
          <!-- Main-body start -->
          <div class="card mb-0 ">    
            <div class="card-header">
              <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                  <a class="reload_card" href="javascript:void(0)">
                    <h5>Benefits</h5>
                  </a>
                </li>
                <!--Filter here-->
              </ul>
            </div>         
            <div class="box-body">
              <div class="card-block table-border-style">
                <div class="table-responsive">
                  <table id="table1" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Benefit ID</th>
                        <th>Name</th>
                        <th>Decription</th>
                        <th>Date Applied</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $id = $user['employee_id'];
                        $sql = "SELECT *, benefit_record.benefit_id AS bid FROM benefit_record LEFT JOIN benefits ON benefits.benefit_id=benefit_record.benefit_id WHERE employee_id='$id' ";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                      ?>
                      <tr>
                        <td><?php echo $row['bid']; ?></td>
                        <td><?php echo $row['benefit_name']; ?></td>
                        <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                          <a href='#view_desc' data-toggle='modal' class='pull-right desc' data-id='<?php echo $row['id']; ?>'>
                            <span class='fa fa-eye ml-5'></span>
                          </a>
                          <?php echo $row['description']; ?>
                        </td>
                        <td>
                          <?php echo (new DateTime($row['date_applied']))->format('F d, Y'); ?>
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
        <!--Pcoded Inner COntent **end**-->
      </div>
      <!--Pcoded  COntent **end**-->
    </div>
  </div>

  <?php 
    require_once('includes/benefit_modal.php');
    require_once("../admin/includes/scripts.php");
  ?>   

<script>
     
  function getRow(id){
    $.ajax({
      type: 'POST',
      url: '/Portal/admin/function/benefits_row.php',
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

    // to avoid the re-initialization of datatable
    if ( ! $.fn.DataTable.isDataTable( '#table1' )) {
      $('#table1').dataTable();
    }//**end**

    $(document).on('click','.desc',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRow(id);
    });

  });

</script>

</body>
</html>

