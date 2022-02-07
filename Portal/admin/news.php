<?php 
  $title ="News";
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
                  <h5 class="m-b-10">News and Updates</h5>
                  <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                </div>
              </div>
              <div class="col-md-4">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                      <a href="index.php"> <i class="fa fa-home"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="news.php">News</a>
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

          <!-- Alert thru Sessions -->
          <?php include_once 'includes/session_alert.php'; ?>
   
          <div class="card">
            <div class="card-header">
              <h5>
                <a type="button" class="btn btn-mat waves-effect waves-light btn-default">News List</a>
              </h5>
              <button type="button" class="btn btn-mat waves-effect waves-light btn-danger float-right" id="deleteAllNews"><i class="fa fa-trash"></i>Delete</button>
              <button type="button" class="btn btn-mat waves-effect waves-light btn-success mx-2 float-right" data-toggle="modal" data-target="#addNews"><i class="fa fa-plus"></i>Add News</button>   
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
                        <th>Reference ID</th>
                        <th>Date</th>
                        <th>Headline</th>
                        <th>Description</th>
                        <th style="max-width: 60px;">Action</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_news">
                      <?php
                        $sql = "SELECT * FROM news";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()):
                      ?>
                      <tr>
                        <td>
                            <div class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input" id="n<?php echo $row['reference_id']; ?>" />
                              <label class="custom-control-label d-flex align-items-center text-center" for="n<?php echo $row['reference_id']; ?>"></label>
                            </div>  
                        </td>
                        <td><?php echo $row['reference_id']; ?></td>
                        <td><?php echo (new Datetime($row['news_date']))->format('F d, Y'); ?></td>
                        <td><?php echo $row['news_headline']; ?></td>
                        <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                          <a href='#viewNews' data-toggle='modal' class='pull-right desc' data-id='<?php echo $row['reference_id']; ?>'>
                          <span class='fa fa-eye ml-3'></span></a>
                          <?php echo $row['news_details']; ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-default btn-sm btn-flat border-success wave-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action
                          </button>
                          <div class="dropdown-menu" style="">
                            <a class="dropdown-item edit" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-edit"></i>Edit</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item delete text-danger" href="javascript:void(0)" data-id="<?php echo $row['reference_id'] ?>"><i class="fa fa-trash"></i>Delete</a>
                          </div>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                      
        </div>
        <!-- Page header -->

      </div>
    </div>
  </div>

  <?php require_once 'includes/news_modal.php'; ?>
  <?php require_once 'includes/alert_modal.php'; ?>
  <?php require_once 'includes/scripts.php'; ?>

  <script>
      
  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'function/news_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        //delete
        $("#del_date").removeClass('d-none');
        $('#del_news').html(response.news_headline);
        $('#del_date').html('Date Published : '+ new Date(response.news_date).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
        //edit
        $('.reference_id').val(response.reference_id);
        $('.news_date').val(response.news_date);
        $('.news_datetext').val((new Date(response.news_date)).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'}));
        $('.news_image').attr('href','<?php echo $global_link; ?>/Portal/admin/uploads/news/'+response.display_image);
        $('.news_image').html(response.display_image);
        $('.news_headline').val(response.news_headline);
        $('.news_detail').val(response.news_details);
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

  //CHECK IF FILE IS VALID (IMAGE)
  function check_image(file_input) {
    //valid extension
    const valid_image = ["jpg", "jpeg", "png"];    
    check_file(file_input,valid_image);
    return true;
  } 


  $(document).ready(function() {

    // to avoid the re-initialization of datatable
    if ( ! $.fn.DataTable.isDataTable( '#table1' ) ) {
      $('#table1').DataTable();
    }//**end**
      
    //news properties
    $(document).on('click','.edit',function(e){
      e.preventDefault();
      $('#editNews').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
    
    $(document).on('click','.delete',function(e){
      e.preventDefault();
      $('#newsDelete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click','.desc',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRow(id);
    });

    //DATA HIDE > ALERT
    $(document).on("click","[data-hide]", function(){
      $("#showdanger").attr('hidden',true);
    });

    //select all
    $(document).on("click","#globalcheck", function(e){
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
    $(document).on("click","#deleteAllNews", function(e){
      //select all checked checkbox
      var ids = $("#tbody_news input:checkbox:checked").map(function(){
        return $(this).attr("id").replace("n","");
      }).get();
      if (ids.length){
        $.ajax({
          type: 'POST',
          url: 'function/news_row.php',
          data: {ids:ids},
          dataType: 'json',
          success: function(response){
            $("#newsDelete").modal('show');
            $(".reference_id").val(ids);
            $("#del_date").html('');
            $("#del_date").addClass('d-none');
            $("#del_news").html((response.length <= 1) ? response.join(", ") : 
              response.slice(0, -1).join(", ")+", and "+response[response.length-1]);   
          }
        });
      }else{
        $("#showdanger").removeAttr("hidden");
        $("#warning").html("Please select news record first !");
      }
    });

  });

  </script>

</body>
</html>




