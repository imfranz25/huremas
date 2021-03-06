

<style>
  .form-card {
    text-align: left
  }

  #msform fieldset:not(:first-of-type) {
    display: none
  }

  #msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
  }

  #msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
  }

  .fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
  }

  .purple-text {
    color: #673AB7;
    font-weight: normal
  }

  .steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
  }

  .fieldlabels {
    color: gray;
    text-align: left
  }

  #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
  }

  #progressbar .active {
    color: #673AB7;
  }

  #progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
  }

  #progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
  }

  #progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
  }

  #progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f2c2"
  }

  #progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
  }

  #progressbar li:before {
    content: '';
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
  }
  .progress {
    height: 2px
  }

  .progress-bar {
    background: #00a713;
  }
  .grow {
  text-align: center;
  animation: grow-animation 1s linear infinite;
  }

  @keyframes grow-animation {
    0% { transform: scale(1); }
    50% {transform: scale(1.03); }
    100% {transform: scale(1); }
  }
</style>



<!-- On-board Applicant-->
<div class="modal fade" id="onBoard" data-backdrop="static" data-keyboard="false" aria-hidden="true" style="background:rgba(0,0,0,.8);">
  <!--Modal Dialog-->
  <div class="modal-dialog modal-lg">
    <!--Modal Content-->
    <div class="modal-content">
      <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title"><b>On-Board Applicant</b></h4>
        <button type="button" class="close" data-dismiss="modal" id="closeOnboard" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Modal Header **End**-->
      <!--Modal Body-->
      <div class="modal-body">
        <!--On-Board Content-->
        <div class="container-fluid">
          <div class="row justify-content-center px-0 px-md-3"> 
            <div class="col-md-12 text-center px-0 px-md-5 mb-2">
              <div class="px-0 pb-0 mt-3 mb-3">
                <h2 id="heading">Register Applicant to Employee List</h2>
                <p>Fill all the input fields to continue</p>
                <form id="msform" method="POST" enctype="multipart/form-data">
                  <!-- progressbar -->
                  <ul id="progressbar" class="mt-4 mb-0 pb-0">
                    <li class="active" id="personal"><strong>Personal</strong></li>
                    <li id="payment"><strong>Employement Details</strong></li>
                    <li id="account"><strong>Account</strong></li>
                    <li id="confirm"><strong>Finish</strong></li>
                  </ul>
                  <div class="progress mt-2 pt-0">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> <br> 
                  <!--Peronal Information-->
                  <fieldset id="first_set">
                    <div class="form-card">
                      <div class="row">
                        <div class="col-12">
                          <h2 class="h4 text-center mt-2">Personal Information</h2>
                          <h6 class="text-center grow">
                            <label class="text-danger req_details d-none">Please complete all the required information (*)</label>
                          </h6>
                        </div>
                        <!--First Name-->
                        <label class="req col-12 mt-3">First Name</label> 
                        <div class="col-12">
                          <input type="text" id="fname_on" name="fname" class="form-control border border-secondary" autocomplete="off" required /> 
                        </div>
                        <!--Middle Name-->
                        <label class="col-12 mt-3">Middle Name (Optional)</label> 
                        <div class="col-12">
                          <input type="text" id="mname_on" name="mname" class="form-control border border-secondary" autocomplete="off" /> 
                        </div>
                        <!--Last Name-->
                        <label class="req col-12 mt-3">Last Name</label> 
                        <div class="col-12">
                          <input type="text" id="lname_on" name="lname" class="form-control border border-secondary" autocomplete="off" required /> 
                        </div>
                        <!--Suffix-->
                        <label class="col-12 mt-3">Suffix (Optional)</label> 
                        <div class="col-12">
                          <input type="text" id="suffix_on" name="suffix" class="form-control border border-secondary" autocomplete="off" /> 
                        </div>
                        <!--Sex-->
                        <label class="req col-12 mt-3">Sex</label> 
                        <div class="col-12">
                          <select id="sex_on" name="sex" class="form-control border border-secondary" required>
                            <option value="">--select sex--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                        <!--Birthday-->
                        <label class="req col-12 mt-3">Birthday</label> 
                        <div class="col-12">
                          <input type="date" id="bday_on" onchange="getAge(this.value)" name="bday" class="form-control border border-secondary" required /> 
                        </div>
                        <!--Age-->
                        <label class="col-12 mt-3">Age</label> 
                        <div class="col-12">
                          <input type="text" id="age_on" class="form-control border border-secondary" readonly /> 
                        </div>
                        <!--Contact-->
                        <label class="req col-12 mt-3">Contact</label> 
                        <div class="col-12">
                          <input type="text" id="contact_on" name="contact" class="form-control border border-secondary" required /> 
                        </div>
                        <!--Contact-->
                        <label class="req col-12 mt-3">Mobile Number</label> 
                        <div class="col-12">
                          <input type="text" id="mobile_on" name="mobile" class="form-control border border-secondary" required /> 
                        </div>
                        <!--Email-->
                        <label class="req col-12 mt-3">Email</label> 
                        <div class="col-12">
                          <input type="email" id="email_on" name="email" class="form-control border border-secondary" required /> 
                        </div>
                        <!--Address-->
                        <label class="req col-12 mt-3">Address</label> 
                        <div class="col-12">
                          <textarea name="address" id="address_on" class="form-control border border-secondary" required rows="3"></textarea>
                        </div>      
                      </div> 
                    </div> 
                    <input type="button" data-id='person' id="stage1"  class="next action-button bg-warning mt-4" value="Next" />
                  </fieldset>

                  <fieldset>
                    <div class="form-card">
                      <div class="row mb-3">
                        <div class="col-12">
                          <h2 class="h4 text-center mt-2">Employment Details</h2>
                          <h6 class="text-center grow">
                            <label class="text-danger req_details d-none">Please complete all the required information (*)</label>
                          </h6>
                        </div>
                        <input type="hidden" name="onboard_job" id="onboard_job">
                        <!--APplicant Number-->
                        <label class="col-12 mt-3">Applicant Number</label> 
                        <div class="col-12">
                          <input type="text" name="appno" id="appno_on" class="form-control" readonly>
                        </div>
                        <!--Position-->
                        <label class="col-12 mt-3">Position</label> 
                        <div class="col-12">
                          <input type="hidden" id="positionid_on" name="posid">
                          <input type="text" id="position_on" class="form-control" readonly>
                        </div>
                        <!--Department-->
                        <label class="col-12 mt-3">Department</label> 
                        <div class="col-12">
                          <input type="hidden" id="departmentid_on" name="department">
                          <input type="text" id="department_on" class="form-control" readonly>
                        </div>
                        <!--Category-->
                        <label for="" class="col-12 mt-3">Category</label>
                        <div class="col-12">
                          <input type="hidden" id="category_id" name="category" readonly>
                          <input type="text" id="category_name" class="form-control" readonly>
                        </div>
                        <!--Photo-->
                        <label class="req col-12 mt-3 req">Upload Photo  (Please attach profile picture in a JPG or PNG Format)</label> 
                        <div class="col-12">
                          <input type="file" id="file_on" class="form-control form-control-file" name="pic" accept="image/*" onchange="check_image(this)" required >
                          <div class="input-group-append text-danger">
                            <label><i class="fa fa-info-circle mr-1 mt-1"></i>Maximum Size 5 MB</label>
                          </div>
                        </div>
                        <!--SSS-->
                        <label class="col-12 mt-3 req">SSS</label> 
                        <div class="col-12">
                          <input type="text" id="sss_on" name="sss" class="form-control border border-secondary" >
                        </div>
                        <!--Pag-ibig-->
                        <label class="col-12 mt-3 req">Pag-ibig</label> 
                        <div class="col-12">
                          <input type="text" id="pagibig_on" name="pagibig" class="form-control border border-secondary" >
                        </div>
                        <!--Philhealth-->
                        <label class="col-12 mt-3 req">Philhealth</label> 
                        <div class="col-12">
                          <input type="text" id="philhealth_on" name="philhealth" class="form-control border border-secondary" >
                        </div>
                        <!--TIN Number-->
                        <label class="col-12 mt-3 req">TIN Number</label> 
                        <div class="col-12">
                          <input type="text" id="tin_on" name="tin" class="form-control border border-secondary" >
                        </div>
                      </div> 
                    </div> 
                    <!--Buttons-->
                    <input type="button" data-id='company' id="stage2" class="next action-button bg-warning" value="Next" />
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                  </fieldset>

                  <fieldset>
                    <div class="form-card">
                      <div class="row mb-3">
                        <div class="col-12">
                          <h2 class="h4 text-center mt-2">Account Information</h2>
                          <h6 class="text-center grow">
                            <label class="text-danger req_details d-none">Please complete all the required information (*)</label>
                          </h6>
                        </div>
                        <!--Username-->
                        <label class="col-12 mt-3">Username</label> 
                        <div class="col-12">
                        <input type="hidden" id="ls_on" name="ls" />
                          <input type="text" id="username_on" name="username" class="form-control border border-secondary" required  readonly /> 
                        </div>
                        <!--User Type-->
                        <label class="req col-12 mt-3 pt-3">User Type</label> 
                        <div class="col-12 pb-4">
                          <select id="type_on" name="type" class="form-control border border-secondary" required>
                            <option value="employee" selected>Employee</option>
                            <option value="admin">Admin</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <h2 class="h4 text-center mt-2 pt-3" style="border-top: 1px solid rgba(0, 0, 0, .4);">Admin Confirmation</h2>
                        </div>
                        <!--Password-->
                        <label class="col-12 req pt-3">Password</label> 
                        <div class="col-12">
                          <input type="password" id="pass_on" name="pass" class="form-control border border-secondary" required  placeholder="Please enter your password for verification and confirmation of the employee details" /> 
                          <div class="invalid-feedback">
                            <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                            <label id="password-invalid">Invalid password, please try again</label>
                          </div>
                        </div>
                        <div class="text-center text-info col-12 mt-3" >
                          <label><i class="fa fa-info-circle mx-1" aria-hidden="true"></i>
                           Note: Please review the employee details before you submit</label>
                        </div>      
                      </div> 
                    </div>
                    <input type="button" data-id='account' id="stage3" class="next action-button bg-warning" value="Submit" /> 
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                  </fieldset>

                  <fieldset>
                    <div class="form-card">
                      <div class="row"></div> <br><br>
                      <h2 class="text-success text-center">
                        <strong>SUCCESS !</strong>
                      </h2><br>
                      <div class="row justify-content-center">
                        <div class="col-3 mx-auto"> 
                          <img id="success-onboard" src="<?php echo $global_link; ?>/Portal/assets/images/success-onboard.png" class="img-fluid mx-auto"> 
                        </div>
                      </div> <br><br>
                      <div class="row justify-content-center mb-4">
                        <div class="col-7 text-center">
                          <h5 class="test-success text-center">Applicant Registered Successfully</h5>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<script>

  //INITIALIZATION -> FIELDSETS / PAGES :))))
  var current_fs, next_fs, previous_fs; 
  var opacity;
  var current = 1;
  var steps = $("fieldset").length;

  //CHECK IF INPUT IS NULL
  function check_null(id){
    if (id=='#age_on') {
      if($(id).val()=='') {
        return true;
      }else{
        return ($(id).val()<18);
      }
    }else{
      return ($(id).val()=='');
    }
  }

  //REMOVE ERROR MESSAGES
  function remove_message(){
    $("#username_on").removeClass("is-invalid");
    $("#password_on").removeClass("is-invalid");
    $("#cpassword_on").removeClass("is-invalid");
  }//REMOVE ERROR MESSAGES **END**

  //UPDATE PROGREE BAR
  function update_progress(stepStage){
    var percent = parseFloat(100 / steps) * stepStage;
    percent = percent.toFixed();
    $(".progress-bar").css("width",percent+"%")
  }

  function getAge(vale){
    $('#age_on').val(getAge1(vale));
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

  $(document).ready(function(){
    //SET PROGRESS TO 1 (DEFAULT)
    update_progress(current);
    //NEXT FUNCTION
    $(document).on('click','.next',function(){
      //INITIALIZE VALUES
      var page = $(this).attr('data-id');
      $(".req_details").addClass('d-none');
      var null_input=true;
      //remove invalid alert
      remove_message();
      //STAGE VALIDATION
      if(page=='person'){
        //check if this page has null values
        null_input = ['#email_on', '#fname_on', '#lname_on', '#sex_on', '#bday_on', '#contact_on', '#address_on', '#mobile_on','#age_on'].some(check_null);
      }else if(page=='company'){
        //check if this page has null values
        null_input = ['#file_on','#sss_on','#pagibig_on','#philhealth_on','#tin_on'].some(check_null);
        if (!null_input) {
          let ln = $('#lname_on').val();
          let fn = $('#fname_on').val();
          let ls = Math.floor(1000 + Math.random() * 9000);
          ln = ln.replace(/\s+/g, '');
          fn = fn.replace(/\s+/g, '');
          $('#username_on').val(ln.toLowerCase()+"."+fn.toLowerCase()+"_"+ls);
          $('#ls_on').val(ls);
        }
      }else{
        //check if this page has null values
        null_input = ['#type_on','#pass_on'].some(check_null);
        //PUSH TO DATABASE IF ALL INPUTS ARE VALID
        if (null_input==false) {
          //GET ALL DATA
          var form_onboard = new FormData($('#msform')[0]);
          //SEND TO DB -> employee and admin table (temporary process)
          null_input = function (){
            //set true temporarily (will set to false if successful onbaord)
            null_input=true; 
            //attempt onboard
            $.ajax({
              type: 'POST',
              url: 'function/job_onboard.php',
              async:false, //important -> return num input value realtime
              cache: false,
              contentType: false,
              processData: false,
              data: form_onboard,
              dataType: 'json',
              success: function(response){
                if (response=='1'){ // 1-> Successfull
                  null_input = false; //onboarded ->next page plzz
                }else if (response=='2'){ // 1-> Successfull
                  $('#pass_on').addClass('is-invalid');  
                }else{
                  $('#errorModal').modal('show');
                  $('#error_msg').html('Connection Timeout');
                }
              }
            });
            return null_input;
          }();
        }
      }
      //IF VALID CONTINUE TO NEXT PAGE
      if (null_input==false){
        //PAGING -> SET PARENT / NEXT PAGE
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //ADD CLASS ACTIVE
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //SHOW THE NEXT PAGE
        next_fs.show();
        //HIDE THE PREVIOUS PAGE
        current_fs.animate({opacity: 0}, {
          step: function(now) {
            // ANIMATE VIA OPACITY
            opacity = 1 - now;
            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
          },
          duration: 500
        });
        //INCREMENT CURRENT PAGE
        update_progress(++current);
      }else{
        $(".req_details").removeClass('d-none');
        $("#onBoard").scrollTop(0);
      }
    });

    
    $(document).on('click','.previous',function(){
      $(".req_details").addClass('d-none');
      //PAGING -> SET PARENT / PREV PAGE
      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();
      //REMOVE RECENT PAGE ACTIVE CLASS
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
      //SHOW PREVIOUS PAGE
      previous_fs.show();
      //HIDE RECENT PAGE
      current_fs.animate({opacity: 0}, {
        step: function(now) {
        //ANIMATION VIA OPCITY
        opacity = 1 - now;
        current_fs.css({
          'display': 'none',
          'position': 'relative'
          });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
      });
      //DECREMENT PAGE
      update_progress(--current);
    });
  });
</script>

