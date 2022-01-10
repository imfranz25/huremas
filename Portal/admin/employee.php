<?php 
$title ="Employee";
include 'includes/session.php';
include 'includes/header.php';

?>
  <body>
  <?php //include 'includes/preloader.php'; ?>
  
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
                                          <h5 class="m-b-10">Employee List</h5>
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
                                          <li class="breadcrumb-item"><a href="employee.php?page=employee_list">Employee List</a>
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
                            <section class="content">
						      <div class="container-fluid">
						         <?php 
                        if (isset($_GET['page'])) {
                          $page = $_GET['page'];
                        }else{
                          $page='employee_list';
                        }

						            include $page.'.php';
						          ?>
						      </div><!--/. container-fluid -->
						    </section>

                             <!-- Main-body end -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/employee_modal.php'; ?>

    <?php include 'includes/scripts.php'; ?>

    

<script>

$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.view').click(function(e){
    e.preventDefault();
    $('#view').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });



  

});


function getRow(id){
  
  $.ajax({
    type: 'POST',
    url: 'function/employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.middlename+' '+response.lastname+' '+response.suffix);
      $('#employee_name').html(response.firstname+' '+response.middlename+' '+response.lastname+' '+response.suffix);
      
      $('#edit_firstname').val(response.firstname);
      $('#edit_middlename').val(response.middlename);
      $('#edit_lastname').val(response.lastname);
      $('#edit_suffix').val(response.suffix);
      $('#edit_address').val(response.address);
      $('#datepicker_edit').val(response.birthdate);
      $('#edit_contact').val(response.contact_info);
      $('#mobile').val(response.mobile_no);
      $('#edit_email').val(response.email);
      $('#gender_val option[value='+response.sex+']').attr('selected','selected');

      $('#position option[value='+response.position_id+']').attr('selected','selected');
      $('#department1 option[value='+response.department_id+']').attr('selected','selected');
      $('#schedule option[value='+response.schedule_id+']').attr('selected','selected');
      $('#category option[value='+response.category_id+']').attr('selected','selected');

       $('#dbimage').val(response.photo);

      var date = new Date(response.birthdate);
      getAge(date);
      getSalary();

      $('#date_hired').val(response.date_hired);
      $('#date_regular').val(response.date_regularization);

      $('#sss').val(response.sss_id);
      $('#pagibig').val(response.pagibig_id);
      $('#phealth').val(response.philhealth_id);
      $('#tin').val(response.tin_num);

      $('#sss_prem').val(response.sss_prem);
      $('#phealth_prem').val(response.philhealth_prem);
      $('#pagibig_prem').val(response.pagibig_prem);

      var paths = "images/"+response.photo;

      $("#cimg").attr("src",paths);

     

      
    }
  });
}


$(document).ready(function() {
    $('#table1').DataTable();

     $('<form method="POST" id="select_form1" action="<?php $_PHP_SELF ?>">'+
     	'<div class="pull-right" >Department: ' +
        '<select class="form-control-sm" id="department" name="depts">'+
        '<option value="">All</option>'+
        '<?php $sql = "SELECT * FROM department_category order by title asc";
		 $query = $conn->query($sql);
		 while($row = $query->fetch_assoc()){?> ?>'+
        '<option value="<?php echo $row['id']?>"<?=$row['id'] == $sel ? ' selected="selected"' : '';?>><?php echo $row['title']?></option>'+

    	'<?php } ?>'+
        '</select>' +
        '</form>' +  
        '</div>').appendTo("#table1_wrapper .dataTables_filter"); //example is our table id

     $(".dataTables_filter label").addClass("pull-right");

     $('#department').change(function(){
      $('#select_form1').submit();

   });



} );

    function getAge(vale){
    $('#age').val(getAge1(vale));
    }

function getAge1(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}
    
function getSalary(){
    var sal = $('#position').find(':selected').data('rate');
    $('#daily_wage').val(sal);
    $('#basic_salary').val(sal*26);

}

function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);

        }
    }


</script>

</body>
</html>


