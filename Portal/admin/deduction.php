<?php 
$title ="Deduction";
include 'includes/session.php';
include 'includes/header.php';
?>
  <body>
  <?php //include 'includes/preloader.php'; ?>
  
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
                                          <h5 class="m-b-10">Deduction</h5>
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
                                          <li class="breadcrumb-item"><a href="#!">Deduction</a>
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
                            <!-- Main-body start -->
                            <div class="card">             
                              <div class="box-body">
                                <div class="card-block table-border-style">

                                  <div class="col-xl-12 col-xl-6">
                                      <!-- Nav tabs -->
                                      <ul class="nav nav-tabs md-tabs" role="tablist" id="deducTab">
                                        <li class="nav-item">
                                          <a class="nav-link active" data-toggle="tab" href="#vtab" role="tab">Vendor</a>
                                          <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" data-toggle="tab" href="#dtab" role="tab">Deduction</a>
                                          <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" data-toggle="tab" href="#ttab" role="tab">Tax</a>
                                          <div class="slide"></div>
                                        </li>
                                      </ul>
                                  </div>

                                      <!-- Tab panes -->
                                  <div class="tab-content">
                                    <!--Vendor Table-->
                                    <div class="card tab-pane fade show active" id="vtab">
                                      <br>
                                       <?php include 'vendor.php'; ?>  
                                    </div>
                                    <!--Deduction Table-->
                                    <div class="card tab-pane fade" id="dtab">
                                      <br>
                                      <?php include 'deduction_type.php'; ?>
                                    </div>
                                    <!--Tax Table-->
                                    <div class="card tab-pane fade" id="ttab">
                                      <br>
                                      <?php include 'tax.php'; ?>
                                    </div>
                                  </div>
                                      <!-- Tab panes **End** -->
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
      include 'includes/vendor_modal.php'; 
      include 'includes/deduction_modal.php'; 
      include 'includes/tax_modal.php'; 
      include 'includes/scripts.php';
    ?>   

<script>

$(function(){

  //VENDOR
  $('.editvendor').click(function(e){
    e.preventDefault();
    $("#vendorEdit").modal('show');
    var id = $(this).data('id');
    getvendor(id);
  });
  $('.deletevendor').click(function(e){
    e.preventDefault();
    $("#vendorDelete").modal('show');
    var id = $(this).data('id');
    getvendor(id);
  });
  $('.desc').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getvendor(id);
  });


  //DEDUCTION
  $('#add_dtype').click(function(e){
    $("#form_deduc")[0].reset();
    $(".deduc_amt").addClass("d-none");
    $(".limit").addClass("d-none")
  });
  $('.editdeduc').click(function(e){
    e.preventDefault();
    $("#deducEdit").modal('show');
    var id = $(this).data('id');
    getdeduction(id);
  });
  $('.deletededuc').click(function(e){
    e.preventDefault();
    $("#deducDelete").modal('show');
    var id = $(this).data('id');
    getdeduction(id);
  });

  //TAX
  $('#add_tax').click(function(e){
    $("#form_tax")[0].reset();
    $(".for_class").addClass("d-none")
    $('.end_date').attr('disabled', true);
  });
  $('.edittax').click(function(e){
    e.preventDefault();
    $("#taxEdit").modal('show');
    var id = $(this).data('id');
    get_tax(id);
  });
  $('.deletetax').click(function(e){
    e.preventDefault();
    $("#taxDelete").modal('show');
    var id = $(this).data('id');
    get_tax(id);
  });

  //DATA HIDE > ALERT
  $("[data-hide]").on("click", function(){
      $("#showdanger").attr('hidden',true);
    });

});

//HIDE TAB FUNCTION 
function hide_tab(){
  $("#vtab").hide();
  $("#dtab").hide();
  $("#ttab").hide();
}

//SHOW LIMIT INPUTS
function show_limit(){
  $(".limit").removeClass("d-none")
}

//HIDE LIMIT INPUT
function hide_limit(){
  $('#edit_dlimit').val(0);
  $('#edit_dperiod').val("None");
  $(".limit").addClass("d-none");
}

//SET FORMULA FOR CHOOSEN TAX TYPE
function set_formula_tax(type){
  $(".for_class").removeClass("d-none");
  (type == "Fixed Amount") ?
    ($('.tax_unit').html(")"),
    $('.for_title').html("Gross Pay - (&#8369;"),
    $('.tax_valid').attr("max",999999),
    $('.amt_title').html("Amount")) :
    ($('.tax_unit').html("%)"),
    $('.for_title').html("Gross Pay - (Gross Pay &times; "),
    $('.tax_valid').attr("max",100),
    $('.amt_title').html("Percent"));
}

//SET FORMULA FOR CHOOSEN DEDUCTION TYPE
function set_formula_deduc(type){
  /*
    NO LIMIT (DEFAULT) WHEN FIX/HOUR AMOUNT IS SET > LIMIT IS HIDE BY DEFAULT
    SHOW LIMIT INPUT  IF THERE IS PERCENTAGE CALCU SELECTED
    SET DYNAMIC FORMULA FOR EVERY CHANGES SET IN SELECTION
  */
  if (type=="Fixed Amount" || type=="Hour Amount"){
    //SET FIX == HIDE LIMIT
    hide_limit();
    $('.amt_title').html("Amount");
    $('.unit').html(")");
    // FORMULA FIXED
    (type=="Fixed Amount") ?
      ($('.type_title').html("Gross Pay - (&#8369; "),
      $('.num_valid').attr("max",99999)) : 
      ($('.type_title').html("Employee Rate per Hour - (&#8369; "),
      $('.num_valid').attr("max",9999));
  }else{
    // SHOW LIMIT INPUT == SET PERCENT
    show_limit();
    $('.amt_title').html("Percent");
    $('.num_valid').attr("max",100)
    $('.unit').html("%)");
    // FORMULA PERCENT
    (type=="Hour Percent") ?
    $('.type_title').html("Rate per Hour - (Rate per Hour &times; ") :
    $('.type_title').html("Gross Pay - (Gross Pay &times; ");
  }
}

//GET VENDOR FUNCTION
function getvendor(id){
  $.ajax({
    type: 'POST',
    url: 'function/vendor_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete (set values)
      $('#del_vendor').val(response.id);
      $('#del_vname').html(response.vendor_name);
      //edit (set values)
      $('#vendor_id').val(response.id);
      $('.edit_vname').val(response.vendor_name);
      $('.edit_acc_id').val(response.account_id);
      $('.edit_vadd').val(response.vendor_address);
      $('.edit_vtype').val(response.vendor_type);
      $('.edit_vdetails').val(response.vendor_details)
    }
  });
}

//GET DEDUCTION FUNCTION
function getdeduction(id){
  $.ajax({
    type: 'POST',
    url: 'function/deduction_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete (set values)
      $('#del_deduc').val(response.id);
      $('#del_dname').html(response.deduction_name);
      //edit (set values)
      $('#edit_did').val(response.id);
      $('#edit_dname').val(response.deduction_name);
      $('.alltype').val(response.deduction_type);
      $('#edit_dvendor').val(response.deduction_vendor);
      $('.edit_damt').val(response.amount_rate);
      $('#edit_ddesc').html(response.deduction_desc);
      $('#edit_deduc_amt').val(response.amount_rate);
      set_formula_deduc(response.deduction_type); // set formula for deduction
    }
  });
}

//GET DEDUCTION FUNCTION
function get_tax(id){
  $.ajax({
    type: 'POST',
    url: 'function/tax_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //delete
      $('#del_tname').html(response.tax_name);
      $('#del_tax').val(response.id);
      //edit (set values)
      $('#edit_tid').val(response.id);
      $('#edit_tname').val(response.tax_name);
      $('#edit_Tcheck').prop('checked', response.tax_status == "active");
      $('#edit_tvendor').val(response.tax_vendor);
      $('#edit_ttype').val(response.tax_type);
      $('#edit_amount').val(response.tax_amount);
      $('#edit_from').val(response.amount_from);
      $('#edit_to').val(response.amount_to);
      $('#edit_start').val(response.tax_start);
      $('#edit_end').val(response.tax_end);
      $('#edit_desc').html(response.tax_desc);
      $('#edit_output').val(response.tax_amount);
      $('.end_date').attr("min",response.tax_start); //set min for end date
      $('#edit_to').attr("min",response.amount_from); // set max for to (amount)
      //disable end date if start is null
      (response.tax_start!="0000-00-00") ? 
        $('.end_date').removeAttr('disabled') : 
        $('.end_date').attr('disabled', true);
      set_formula_tax(response.tax_type); //set formula for tax
    }
  });
}

$(document).ready(function() {

  //reset form deduc add
  $('#reset_adeduc').click(function(e){
    $(".deduc_amt").addClass("d-none");
    $(".limit").addClass("d-none")
  });//**end**

  // to avoid the re-initialization of datatable
  if ( ! $.fn.DataTable.isDataTable( '#table1' ) && ! $.fn.DataTable.isDataTable( '#table2' ) && ! $.fn.DataTable.isDataTable( '#table3' )) {
    $('#table1').DataTable();
    $('#table2').DataTable();
    $('#table3').DataTable();
  }//**end**

  // ensure that the other tab pane is hidden when the other one is shown :)
  $('.nav-tabs li a').on('shown.bs.tab', function(){
    var activeTab = $(this).attr('href');
    hide_tab();
    $(activeTab).show();
    $(':checkbox').each(function() {
      this.checked = false;        
    });
    // ALWAYS CHECK ACTIVE CHECKBOX
    $('#Tcheck').prop('checked', true);
  });//**end**

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
    // ALWAYS CHECK ACTIVE CHECKBOX
    $('#Tcheck').prop('checked', true);
  });

  //delete all checked checkbox :)
  $('#deleteAllvendor').click(function(e){
    //select all checked checkbox
    var ids = $("#tbody_vendor input:checkbox:checked").map(function(){
      return $(this).attr("id").replace("v","");
    }).get();
    if (ids.length){
      $.ajax({
        type: 'POST',
        url: 'function/vendor_row.php',
        data: {ids:ids},
        dataType: 'json',
        success: function(response){
          $("#vendorDelete").modal('show');
          $("#del_vendor").val(ids);
          $("#del_vname").html((response.length <= 1) ? response.join(", ") : response.slice(0, -1).join(", ")+", and "+response[response.length-1]);
        }
      });
    }else{
      $("#showdanger").removeAttr("hidden");
      $("#warning").html("Please select vendor record first !");
    }
  });

  //delete all checked checkbox :)
  $('#deleteAlldeduc').click(function(e){
    //select all checked checkbox
    var ids = $("#tbody_deduc input:checkbox:checked").map(function(){
      return $(this).attr("id").replace("d","");
    }).get();
    if (ids.length){
      $.ajax({
        type: 'POST',
        url: 'function/deduction_row.php',
        data: {ids:ids},
        dataType: 'json',
        success: function(response){
          $("#deducDelete").modal('show');
          $("#del_deduc").val(ids);
          $("#del_dname").html((response.length <= 1) ? response.join(", ") : response.slice(0, -1).join(", ")+", and "+response[response.length-1]);
        }
      });
    }else{
      $("#showdanger").removeAttr("hidden");
      $("#warning").html("Please select deduction record first !");
    }
  });

  

  //delete all checked checkbox :)
  $('#deleteAlltax').click(function(e){
    //select all checked checkbox
    var ids = $("#tbody_tax input:checkbox:checked").map(function(){
      return $(this).attr("id").replace("t","");
    }).get();
    if (ids.length){
      $.ajax({
        type: 'POST',
        url: 'function/tax_row.php',
        data: {ids:ids},
        dataType: 'json',
        success: function(response){
          $("#taxDelete").modal('show');
          $("#del_tax").val(ids);
          $("#del_tname").html((response.length <= 1) ? response.join(", ") : response.slice(0, -1).join(", ")+", and "+response[response.length-1]);
        }
      });
    }else{
      $("#showdanger").removeAttr("hidden");
      $("#warning").html("Please select tax record first !");
    }
  });

  // STORE ACTIVE TAB (INCASE USER RELOAD THE PAGE IT RETURNS TO ACTIVATED TAB) :) UWU
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    sessionStorage.setItem('activeTab', $(e.target).attr('href'));
  });
  var activeTab = sessionStorage.getItem('activeTab');
  if(activeTab){
    $('#deducTab a[href="' + activeTab + '"]').tab('show');
  }
  //ACTIVE TAB **END**

  //DYNMIC FORM FOR DEDUCTION TYPE
  $(document).on('change', '.alltype', function() {
    $(".deduc_amt").removeClass("d-none"); // show amount (hide by default)
    set_formula_deduc($(this).val());
  });

  //DYNMIC FORM FOR DEDUCTION TYPE
  $(document).on('change', '.taxstype', function() {
    $('.for_class').removeClass('d-none');
    set_formula_tax($(this).val());
  });

  //SET MIN BASED ON TAX FROM AMOUNT
  $(document).on('change', '.tax_from', function() {
    $('.tax_to').attr("min",$(this).val());
  });

  //SET MIN BASED ON TAX FROM AMOUNT
  $(document).on('change', '.start_date', function() {
    ($(this).val()!="") ?
      ($('.end_date').attr("min",$(this).val()),
      $(".end_date").removeAttr('disabled')):
      ($('.end_date').attr("min",null),
      $('.end_date').val(""),
      $('.end_date').attr('disabled', true));
  });



});
</script>

</body>
</html>

