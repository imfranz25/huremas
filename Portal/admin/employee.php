<?php 
  $title ="Employee";
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
                  <h5 class="m-b-10">Employee List</h5>
                  <p class="m-b-0">Welcome to HUREMAS - CvSU IMUS</p>
                </div>
              </div>
              <div class="col-md-4">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                      <a href="index.php"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#!">Employee</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="employee.php?page=employee_list">Employee List</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Page-Innder Content -->
        <div class="pcoded-inner-content">
          <?php include_once 'includes/session_alert.php'; ?>         
          <!-- Main-body start -->
          <section class="content">
            <div class="container-fluid">
              <?php 
                $page = $_GET['page'];
                require_once $page.'.php';
              ?>
            </div>
          </section>
        </div>
        <!-- Page-Innder Content End -->

      </div>
    </div>
  </div>
       

  <?php require_once 'includes/employee_modal.php'; ?>
  <?php require_once 'includes/benefit_record_modal.php'; ?>
  <?php require_once 'includes/alert_modal.php'; ?>
  <?php require_once 'includes/scripts.php'; ?>

    

<script>

  //INITIALIZATION
  $('#table1').DataTable();
  $('#benefit_record_table').DataTable();

  var show = true;
  function showCheckboxes() {
    var checkboxes = document.getElementById("checkBoxes");
    if (show) {
      checkboxes.style.display = "block";
      show = false;
    }else {
      checkboxes.style.display = "none";
      show = true;
    }
   }

  function reload(id){
    <?php 
      //prepared stmt for position filter // js
      $query = $conn->prepare("SELECT * FROM position WHERE type=? ");
      $query->bind_param('s',$id); 
    ?>

    if(id=='1'){
      $('#position').html(`<?php 
        $id = '1';
        $query->execute();
        $result = $query->get_result();
        while($prow = $result->fetch_assoc()){
          echo '<option value="'.$prow['id'].'" data-rate="'.$prow['rate'].'">'.$prow['description'].'</option>';
        } 
      ?>`);
      $('#income').html('Basic Salary');
    }else {
      $('#position').html(`<?php 
        $id = '1';
        $query->execute();
        $result = $query->get_result();
        while($prow = $result->fetch_assoc()){
          echo '<option value="'.$prow['id'].'" data-rate="'.$prow['rate'].'">'.$prow['description'].'</option>';
        } 
      ?>`);
      $('#income').html('Rate per hour');
    }
  }

  function getDeduc(id){
    $.ajax({
      type: 'POST',
      url: 'function/employee_deduction_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#deduc_list').html('');
        let len= response.length;
        if(len>0){
          $('#deducts_view').removeClass('d-none');
          for(let i=0;i<len;i++){
            $('#deduc_list').append(`<li>${(response)[i].deduction_name}</li>`);
          }
        }else{
          $('#deducts_view').addClass('d-none'); 
        }
      }
    });
  }

  function getRow(id){
    $.ajax({
      type: 'POST',
      url: 'function/employee_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('.empid').val(response.empid);
        $('.eid').val(response.employee_id);
        $('.employee_id').html(response.employee_id);
        $('.del_employee_name').html(response.firstname+' '+response.middlename+' '+response.lastname+' '+response.suffix);
        $('#employee_name').html(response.firstname+' '+response.middlename+' '+response.lastname+' '+response.suffix);
        $('.recid').val(response.employee_id);
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
        $('#department1 option[value='+response.department_id+']').attr('selected','selected');
        $('#category option[value='+response.category_id+']').attr('selected','selected');
        
        let avatar = (response.photo!='')?response.photo:'profile.jpg';
        //view
        $('#cimg_view').attr('src','<?php echo $global_link; ?>/Portal/admin/images/'+avatar);
        $('#view_firstname').val(response.firstname);
        $('#view_middlename').val((response.middlename=='')?'N/A':response.middlename);
        $('#view_lastname').val(response.lastname);
        $('#view_suffix').val((response.suffix=='')?'N/A':response.suffix);
        $('#view_address').val(response.address);
        $('#datepicker_view').val(response.birthdate);
        $('#view_contact').val(response.contact_info);
        $('#view_mobile').val(response.mobile_no);
        $('#view_email').val(response.email);
        $('#gender_view').val(response.sex);
        $('#view_category').val(response.cat);
        $('#view_department1').val(response.title);
        $('#view_position').val(response.description);
        $('#view_sss').val(response.sss_id);
        $('#view_pagibig').val(response.pagibig_id);
        $('#view_phealth').val(response.philhealth_id);
        $('#view_tin').val(response.tin_num);
        $('#view_basic_salary').val(response.rate);
        $('#view_date_hired').val(response.date_hired);

        reload(response.category_id);

        $('#position option[value='+response.position_id+']').attr('selected','selected');

        if(response.category_id==1){
          $('#income').html('Basic Salary');
        }else{
          $('#income').html('Rate per hour');
        }

        $('#dbimage').val(response.photo);

        var date = new Date(response.birthdate);
        getAge(date);
        getSalary();

        $('#date_hired').val(response.date_hired);
        $('#sss').val(response.sss_id);
        $('#pagibig').val(response.pagibig_id);
        $('#phealth').val(response.philhealth_id);
        $('#tin').val(response.tin_num);

        var paths = "images/"+response.photo;
        $("#cimg").attr("src",paths);

        if(response.category_id=='1'){
          deducts.style.display = "block";
        }else{
          deducts.style.display = "none";
        }

        //benefit record
        $('#emp_name').html(response.firstname+' '+response.middlename+' '+response.lastname);
        $('.emp_id_ben').val(response.employee_id);

      }
    });
  }

  function getRow2(id){
    $.ajax({
      type: 'POST',
      url: 'function/employee_deduction_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        if(response.length>0){
          for (var i = 0; i < response[0].rowcount; i = i + 1) {
            $('.myCheckbox')[i].checked = false;
           }
           for (var i = 1; i < response.length+1; i = i + 1) {
            var idcheck = "#cb"+response[i].deduction_id;
            $(idcheck).prop('checked', true);
           }
         }
      }
    });
  }


  function populateBenefit(id){
    $.ajax({
      type: 'POST',
      url: 'function/benefit_record_row.php',
      data: {pid:id},
      dataType: 'json',
      success: function(response){
        if (response.length>0) {
          let len = response.length;
          $("#select_benefit").html(`<option selected value=''>
            --select benefits---</option>`); 
          for (var i = 0; i < len; i++) {
            $("#select_benefit").append(`<option data-desc='${(response)[i].description}' value='${(response)[i].bid}'>
              ${(response)[i].benefit_name}</option>`); 
          }
        }else {
          $("#select_benefit").html(`<option selected value=''>
            --There are benefits avaialable---</option>`); 
        }
      }
    });
  }


  function getBenefit(id){
    $.ajax({
      type: 'POST',
      url: 'function/benefit_record_row.php',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        $('#benefit_record_table').DataTable().clear().destroy();
        $('#benefit_body').html('');
        let len = response.length;
        for (var i = 0; i < len; i++) {
          $('#benefit_body').append(`
            <tr>
              <td>${(response)[i].benefit_id}</td>
              <td>${(response)[i].benefit_name}</td>
              <td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 250px;'>
                <a href='#viewBeninfo' data-toggle='modal' class='pull-right viewBene' data-id='${(response)[i].bid}'>
                  <span class='fa fa-eye ml-3'></span>
                </a>
                ${(response)[i].description}
              </td>
              <td>${(new Date((response)[i].date_applied)).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'})}</td>
              <td>
                <button data-target="#removeBene" data-toggle="modal" class="btn btn-sm btn-danger btn-round removeBene" data-id="${(response)[i].brid}">
                  <i class="fa fa-trash"></i> Remove
                </button>
              </td>
            </tr
          `);
        }
        $('#benefit_record_table').DataTable();
      }
    });
  }

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
  }

  function getSalary2(){
    var sal = $('#position').find(':selected').data('rate');
    var d1 = $('#schedule').find(':selected').data('in');
    var d2 = $('#schedule').find(':selected').data('out');
    if(sal!=null){
      //create date format          
      var timeStart = new Date("01/01/2007 " + d1).getHours();
      var timeEnd = new Date("01/01/2007 " + d2).getHours();
      var hourDiff = timeEnd - timeStart;

      $('#daily_wage').val(sal);
      $('#basic_salary').val(sal*26*hourDiff);
    }
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



  $(document).ready(function() {
    
    //employee properties
    $(document).on('click','.viewBenefits',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var eid = $(this).data('eid');
      populateBenefit(eid);
      getBenefit(eid);
      getRow(id);
      $('#benModal').modal('show');
    });
      
    $(document).on('click','.edit',function(e){
      e.preventDefault();
      $('#edit').modal('show');
      var id = $(this).data('id');
      var eid = $(this).data('eid');
      getRow(id);
      getRow2(eid);
    });
    
    $(document).on('click','.view',function(e){
      e.preventDefault();
      $('#view').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
  
   $(document).on('click','.delete',function(e){
      e.preventDefault();
      $('#delete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });
  
    $(document).on('click','.photo',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRow(id);
    });
  
    $(document).on('click','#addBeneFormat',function(e){
      e.preventDefault();
      $('#benefit_desc').val('');
    });
  
  
    $(document).on('change','#category', function () {
      var selectVal = $("#category option:selected").val();
      var deducts = document.getElementById("deducts");
      if (selectVal=='1') {
        deducts.style.display = "block";
      }else{
        deducts.style.display = "none";
      }
    });   
    
    // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
    $(document).on('hidden.bs.modal','body', function () {
      if($('.modal.show').length > 0){
        $('body').addClass('modal-open');
      }
    });

    $('<form method="POST" id="select_form1" action="<?php $_PHP_SELF ?>">'+
     	'<div class="pull-right" >Department: ' +
        '<select class="form-control-sm" id="department" name="depts">'+
        '<option value="">All</option>'+
        '<?php $sql = "SELECT * FROM department_category order by title asc";
		    $query = $conn->query($sql);
		    while($row = $query->fetch_assoc()){ ?> ?>'+
          '<option value="<?php echo $row['id']?>"<?=$row['id'] == $sel ? ' selected="selected"' : '';?>><?php echo $row['title']?></option>'+
    	  '<?php } ?>'+
        '</select>' +
      '</form>' +  
      '</div>').appendTo("#table1_wrapper .dataTables_filter"); 
      $(".dataTables_filter label").addClass("pull-right");

    $(document).on('change','#department',function(){
      $('#select_form1').submit();
    });
   
    $(document).on('click','.viewBene',function(e){
      e.preventDefault();
      let id = $(this).data('id');
      $('#view_desc').modal('show');
      $.ajax({
        type: 'POST',
        url: 'function/benefits_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
          $('.edit_title').val(response.benefit_name);
          $('.edit_description').val(response.description);
          $('#view_benefit').html(response.description);
        }
      });
    });

    $(document).on('click','.removeBene',function(e){
      e.preventDefault();
      let id = $(this).data('id');
      $.ajax({
        type: 'POST',
        url: 'function/benefit_record_row.php',
        data: {bid:id},
        dataType: 'json',
        success: function(response){
          $('#del_beneid').val(id);
          $('#del_benefit').html(response.benefit_name);
          $('#del_applied').html('Date Applied : '+(new Date(response.date_applied)).toLocaleString('en-us',{month:'long',day:'numeric',year:'numeric'}));
        }
      });
    });

    $(document).on('change','#select_benefit',function(e){
      e.preventDefault();
      let desc = $(this).find(':selected').data('desc');
      $(benefit_desc).val(desc);
    });


    $(document).on('submit','#deleteBeneForm',function(e){
      e.preventDefault();
      let form = $(this).serialize();
      let id = $('.emp_id_ben').val();
      $.ajax({
        type: 'POST',
        url: 'function/benefit_record_delete.php',
        data: form,
        dataType: 'json',
        success: function(response){
          $('#removeBene').modal('hide');
          if(response=='1'){
            getBenefit(id);
            populateBenefit(id);
            $('#successModal').modal('show');
            $('#success_msg').html('Benefit removed successfully');
          }else{
            $('#errorModal').modal('show');
            $('#error_msg').html('Something went wrong, please try again!');
          }
        }
      });
    });

    $(document).on('submit','#addbene_submit',function(e){
      e.preventDefault();
      let form = $(this).serialize();
      let id = $('.emp_id_ben').val();
      $.ajax({
        type: 'POST',
        url: 'function/benefit_record_add.php',
        data: form,
        dataType: 'json',
        success: function(response){
          $('#addBene').modal('hide');
          if(response=='1'){
            getBenefit(id);
            populateBenefit(id);
            $('#successModal').modal('show');
            $('#success_msg').html('Benefit applied successfully');
          }else{
            $('#errorModal').modal('show');
            $('#error_msg').html('Something went wrong, please try again!');
          }
        }
      });
    });



  });//end of document ready

</script>

</body>
</html>


