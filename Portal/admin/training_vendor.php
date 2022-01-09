<?php 
$title ="Training Vendor";
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
                                          <h5 class="m-b-10">Training Vendors</h5>
                                          <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.php"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="training_vendor.php">Training</a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="training_vendor.php">Courses</a>
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
                            if(isset($_SESSION['warning'])){
                            echo "
                                <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <h4><i class='icon fa fa-warning'></i> Note! (Please Update Deduction/Tax Vendor first !)</h4>
                                ".$_SESSION['warning']."
                                </div>
                            ";
                            unset($_SESSION['warning']);
                            }
                            
                        ?>

                        <button type="button" class="btn btn-mat waves-effect waves-light btn-success" data-toggle="modal" data-target="#vendorNew" id="btnvendor"><i class="fa fa-plus"></i>Add Vendor</button>
                        <button type="button" class="btn btn-mat waves-effect waves-light btn-danger" data-toggle="modal" id="deleteAllVendor"> <i class="fa fa-trash"></i>Delete</button>

                        
                             <div class="card">
                            <div class="card-header">
                                                <h5>Training Vendor List</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                            <div class="box-body">
                            <div class="card-block table-border-style" style="min-height: 400px;">
             
                                <div class="table-responsive">
                                <table id="table1" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th style="max-width: 15px;">
                                          <div class="custom-control custom-checkbox m-0 p-0">
                                            <input type="checkbox" class="custom-control-input" id="globalcheck" />
                                            <label class="custom-control-label d-flex align-items-center text-center" for="globalcheck"></label>
                                          </div>
                                        </th>
                                        <th>Vendor Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Experience</th>
                                        <th style="max-width: 60px;">Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody_vendor">
                                    <?php
                                        $sql = "SELECT * FROM training_vendor";
                                        $query = $conn->query($sql);
                                        while($row = $query->fetch_assoc()){
                                        ?>
                                            <tr>
                                              <td>
                                                  <div class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox" class="custom-control-input" id="n<?php echo $row['id']; ?>" />
                                                    <label class="custom-control-label d-flex align-items-center text-center" for="n<?php echo $row['id']; ?>"></label>
                                                  </div>  
                                              </td>
                                              <td><?php echo $row['vendor_code']; ?></td>
                                              <td><?php echo $row['vendor_name']; ?></td>
                                              <td><?php echo $row['email']; ?></td>
                                              <td><?php echo $row['contact']; ?></td>
                                              <td><?php echo $row['experience']; ?></td>
                                              <td>
                                                  <button class="btn btn-success btn-sm edit btn-round" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                                  <button class="btn btn-danger btn-sm delete btn-round" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                    </div>
                                    </div>
                                </div>
                                </div>

                      
  
                        </div>
                        <!--Pcoded Inner COntent **end**-->
                  </div>
                  <!--Pcoded  COntent **end**-->
        </div>
    </div>


    <?php 

      include 'includes/training_vendor_modal.php';
      include 'includes/scripts.php';
    ?>   

<script>

  $(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#vendorEdit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
  $('.desc').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });
  $('.delete').click(function(e){
    e.preventDefault();
    $('#vendorDelete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });



});


function getRow(id){
  
  $.ajax({
    type: 'POST',
    url: 'function/training_vendor_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $("#del_code").removeClass('d-none');
      $('#del_vendor').html(response.vendor_name);
      $('#del_code').html('Vendor Code : '+response.vendor_code);
      //edit
      $('.vendor_id').val(response.id);
      $('.vendor_name').val(response.vendor_name);
      $('.vendor_email').val(response.email);
      $('.vendor_contact').val(response.contact);
      $('.vendor_cperson').val(response.contact_person);
      $('.vendor_exp').val(response.experience);
    }
  });
}


$(document).ready(function() {

    // to avoid the re-initialization of datatable
    if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
      $('#table1').DataTable();
    }//**end**

    //DATA HIDE > ALERT
  $("[data-hide]").on("click", function(){
      $("#showdanger").attr('hidden',true);
    });

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
  $('#deleteAllVendor').click(function(e){
    //select all checked checkbox
    var ids = $("#tbody_vendor input:checkbox:checked").map(function(){
      return $(this).attr("id").replace("n","");
    }).get();

    if (ids.length){
      $.ajax({
        type: 'POST',
        url: 'function/training_vendor_row.php',
        data: {ids:ids},
        dataType: 'json',
        success: function(response){
          $("#vendorDelete").modal('show');
          $(".vendor_id").val(ids);
          $("#del_code").html('');
          $("#del_code").addClass('d-none');
          $("#del_vendor").html((response.length <= 1) ? response.join(", ") : response.slice(0, -1).join(", ")+", and "+response[response.length-1]);
          
        }
      });
    }else{
      $("#showdanger").removeAttr("hidden");
      $("#warning").html("Please select vendor first !");
    }
  });

});

</script>

</body>
</html>

