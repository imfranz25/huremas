<?php 
$title="Profile";
include 'includes/session.php';
include 'includes/header.php';
?>
<!-- Remove Green Theme Temporarily including shadows -->  
<style type="text/css">
  body[themebg-pattern="theme1"] {
  background-color: #f3f3f3;}
  .pcoded .pcoded-container {
  -webkit-box-shadow: none;
          box-shadow: none }


</style>

<body>
  <?php include 'includes/preloader.php'; ?>
  
    <!-- Pcoded -->  
    <div id="pcoded" class="pcoded">
        <!-- Pcoded Container-->   
        <div class="pcoded-container">
        <!-- Navigation Header -->
        <?php include 'includes/navbar.php'?>
        <!-- Navigation Header End -->

        <!--================================================================================== -->

        <!-- Profile Page Row -->    
        <div class="container-fluid row mt-5">
          <!-- Profile Menu Column -->
          <div class="col-lg-3">
            <br><!-- Break -->
            <!-- Card - Profile Menu -->
            <div class="card">
              <!-- Profile Sidebar Header -->
              <div class="p-3 rounded-top" style="background: #379C43">
                <div class="d-flex justify-content-center">
                  <img class="img-80 img-radius m-2" src="../assets/images/avatar-4.jpg" alt="User-Profile-Image">
                </div>    
                <h5 class="text-center text-white">Dream</h5>    
              </div>
              <!-- Profile Sidebar Header **End**-->
              <ul class="nav nav-tabs md-tabs flex-column" id="profile_tab" role="tablist">
                <li class="nav-item text-left container">
                  <a class="nav-link f-14" data-toggle="tab" href="#personal" role="tab" onclick="change_title('Profile')" >
                    <i class="ti-user mr-2" aria-hidden="true"></i>Personal Information
                  </a><hr class="m-0 divider" />
                </li>
                <li class="nav-item text-left container">
                  <a class="nav-link f-14" data-toggle="tab" href="#inbox" role="tab" onclick="change_title('Inbox')" >
                    <i class="ti-email mr-2" aria-hidden="true"></i>Inbox
                  </a><hr class="m-0 divider" />
                </li>
                <li class="nav-item text-left container">
                  <a class="nav-link f-14" data-toggle="tab" href="#setting" onclick="change_title('Settings')" >
                    <i class="ti-settings mr-2" aria-hidden="true" role="tab"></i>Settings
                  </a><hr class="m-0 divider" />
                </li>
                <li class="nav-item text-left container">
                  <a class="nav-link f-14" href="logout.php">
                    <i class="ti-layout-sidebar-left mr-2" aria-hidden="true"></i>Logout
                  </a>
                </li>
              </ul> 
            </div>
            <!-- Card - Profile Menu End-->
          </div>
          <!-- Profile Menu Column End-->


          <!--========================================================================= -->

          <!-- Profile Page Column -->
          <div class="col-lg-9 tab-content">
            <br><!-- Break -->   
            <!-- Personal Information Container-->
            <div class="card tab-pane fade show active" id="personal">
              <div class="card-header">
                <h5>Personal Information</h5>
              </div> 
              <div class="card-block">
                <!--Employee ID -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Employee ID</label>
                  <div class="col-lg-6">
                    <input type="text" name="employeeid" id="employeeid" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Position -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Position</label>
                  <div class="col-lg-6">
                    <input type="text" name="position" id="position" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Full Name -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Full Name</label>
                  <div class="col-lg-6">
                    <input type="text" name="fullname" id="fullname" class="form-control"readonly> 
                  </div> 
                </div>
                <!--Birthdate -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Birthdate</label>
                  <div class="col-lg-6">
                    <input type="text" name="birthdate" id="birthdate" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Sex -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Sex</label>
                  <div class="col-lg-6">
                    <input type="text" name="sex" id="sex" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Religion -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Religion</label>
                  <div class="col-lg-6">
                    <input type="text" name="religion" id="religion" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Civil Status -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Civil Status</label>
                  <div class="col-lg-6">
                    <input type="text" name="civilstatus" id="civilstatus" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Address -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Address</label>
                  <div class="col-lg-6">
                    <input type="text" name="address" id="address" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Contact Number -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Contact Number</label>
                  <div class="col-lg-6">
                    <input type="text" name="contact" id="contact" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Email Address -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Email Address</label>
                  <div class="col-lg-6">
                    <input type="email" name="email" id="email" class="form-control" readonly> 
                  </div> 
                </div>
              </div>
              <!-- Card Block End-->
            </div>
            <!-- Card Container End-->

            <!--=====================================================================-->

            <!-- Inbox Container-->
            <div class="card tab-pane fade" id="inbox">
            <!--Inbox Page-->
              <div class="card-header">
                <h5>Inbox</h5>
              </div> 
              <div class="card-block">

                <!--No Notification Message > Visible By Default-->
                <div id="no_notif" class="row m-auto">
                  <div class="col-lg-12 p-3 text-center">
                    <img src="../assets/images/no_notif.png" alt="No Notification" class="img-radius img-fluid mx-auto d-block p-4">
                    <h5>YOU HAVE NO MESSAGES AT A MOMENT</h5>
                    <label>When you have messages they show up here. Stay Tune for updates !</label>
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto mb-3 mt-3" id="refresh_inbox" name='refresh'>Refresh</button>
                  </div>
                </div>
                <!--No Notification Message End-->

                <!-- Inbox Sample *-->
                <div id="inbox-content" class="d-none">
                  <div class="row p-2">
                    <div class="col-9 col-md-6 d-flex align-items-center">
                      <h5 class="font-light">
                      <i class="ti-email"></i> 2 Unread Message(s)</h5>
                    </div>
                    <div class="col-3 col-md-6">
                      <ul class="float-right">
                        <li class="text-danger overflow-auto">
                          <a href="#">
                            <button class="btn btn-circle btn-danger text-white" href="#">
                            <i class="fa fa-trash"></i>
                            </button>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <!--=========================SAMPLE MESSAGE==============================-->

                  <!-- Inbox Table-->
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tbody>

                        <tr>
                           <!-- CHECK BOX WITH PROFILE IMAGE AND NAME -->
                          <td class="align-middle">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="inbox1" />
                              <label class="custom-control-label" for="inbox1">&nbsp;</label>
                            </div>
                            <a class="link" href="#">
                              <img src="../assets/images/avatar-4.jpg" alt="user image" class="img-radius img-30 m-r-15">
                              <span class="mb-0 text-muted">Francis Ong</span>
                            </a>
                          </td>
                          <!-- INBOX MESSAGE CONTENT -->
                          <td class="align-middle">
                            <a class="link" href="#">
                              <span class="text-dark">Hello Its my Brithday :)</span>
                            </a>
                          </td>
                          <!-- DATE / TIME -->
                          <td class="text-muted align-middle">May 13</td>
                          <!-- ACTIONS / MISC -->
                          <td class="align-middle">
                            <a href="#"><i class="fa fa-trash m-1 float-right"></i></a>
                            <a href="#"><i class="fa fa-star m-1 float-right"></i></a>
                            <a href="#"><i class="fa fa-bookmark m-1 float-right"></i></a>
                          </td>
                        </tr>    

                        <tr>
                           <!-- CHECK BOX WITH PROFILE IMAGE AND NAME -->
                          <td class="align-middle">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="inbox2" />
                              <label class="custom-control-label" for="inbox2">&nbsp;</label>
                            </div>
                            <a class="link" href="#">
                              <img src="../assets/images/avatar-4.jpg" alt="user image" class="img-radius img-30 m-r-15">
                              <span class="mb-0 text-muted">Francis Ong</span>
                            </a>
                          </td>
                          <!-- INBOX MESSAGE CONTENT -->
                          <td class="align-middle">
                            <a class="link" href="#">
                              <span class="text-dark">Hello Its my Brithday :)</span>
                            </a>
                          </td>
                          <!-- DATE / TIME -->
                          <td class="text-muted align-middle">May 13</td>
                          <!-- ACTIONS / MISC -->
                          <td class="align-middle">
                            <a href="#"><i class="fa fa-trash m-1 float-right"></i></a>
                            <a href="#"><i class="fa fa-star m-1 float-right"></i></a>
                            <a href="#"><i class="fa fa-bookmark m-1 float-right"></i></a>
                          </td>
                        </tr> 

                      </tbody>            
                    </table>            
                  </div>
                  <!-- Inbox Table **End**-->
                </div>
                <!-- Inbox Sample **End**-->

                <!--=========================SAMPLE MESSAGE==============================-->


              </div>
            </div>
            <!--Inbox End-->

            <!--=====================================================================-->

            <!-- Settings Container-->
            <div class="card tab-pane fade" id="setting">
              <!--Settings Page-->
              <div class="card-header">
                <h5>Settings</h5>
              </div> 

              <!--Success Message-->
              <div class='alert alert-success alert-dismissible m-4 d-none' id="alert-success">
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Success!</h4>
                <label id="success-message"></label>
              </div>
              <!--Error Message-->
              <div class='alert alert-danger alert-dismissible d-none' id="alert-error">
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Error!</h4>
              </div>

              <!--Card Block Settings-->
              <div class="card-block">
                <form method="post" id="change">
                  <!--Current Password-->
                  <div class="row d-flex m-3">
                    <label class="col-lg-2 col-form-label" for="currentpass">Current Password</label>
                    <div class="col-lg-6">
                      <input type="password" name="currentpass" id="currentpass" class="form-control" placeholder="Current Password" required /> 
                      <div class="invalid-feedback">
                        <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                        <label id="current-invalid"></label>
                      </div>
                    </div> 
                  </div>
                  <!--New Password-->
                  <div class="row d-flex m-3">
                    <label class="col-lg-2 col-form-label" for="newpass">New Password</label>
                    <div class="col-lg-6">
                      <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" required /> 
                      <div class="invalid-feedback">
                        <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                        <label id="new-invalid"></label>
                      </div>
                    </div> 
                  </div>
                  <!--Confirm Password-->
                  <div class="row d-flex m-3">
                    <label class="col-lg-2 col-form-label" for="confirmpass">Confirm Password</label>
                    <div class="col-lg-6">
                      <input type="password" name="confirmpass" id="confirmpass" class="form-control" placeholder="Confirm Password" required /> 
                      <div class="invalid-feedback">
                        <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                        <label id="confirm-invalid"></label>
                      </div>
                    </div> 
                  </div>
                  <div class="row d-flex m-3">
                    <div class="col-lg-4">
                      <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center mb-3 mt-3 mx-auto" id="changepass" name='changepass'>Change Password</button>                     
                    </div>
                    <div class="col-lg-4">
                      <input type="reset" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center mb-3 mt-3 mx-auto" id="clear" name="clear" value="Clear" />
                    </div>
                </form>
                </div>
                <!--Card Block Settings **End**-->

              </div>
            </div>
            <!--Settings End-->
          </div>
          <!-- Profile Page Column **End**-->
        </div>
        <!-- Profile Page Row **End**-->    
        </div>
        <!-- Pcoded Container **End**-->  
    </div>
    <!-- Pcoded **End**-->  

    <?php include 'includes/scripts.php'; ?>
 
    <script>

      //GET PROFILE DETAILS
      function get_profile(){
        $.ajax({
          type: 'POST',
          url: 'function/get_profile.php',
          dataType: 'json',
          success: function(response){
            $('#employeeid').val(response.employee_id);
            $('#fullname').val(response.firstname+' '+response.middlename+' '+response.lastname+' '+response.suffix);
            $('#address').val(response.address);
            $('#birthdate').val(new Date(response.birthdate).toLocaleString('en-us',{month:'long', year:'numeric', day:'numeric'}));
            $('#contact').val(response.contact_info);
            $('#email').val(response.email);
            $('#sex').val(response.sex).html(response.sex);
            $('#position').val(response.description);
            //religion
            //civil status
          }  
        });
      }//GET PROFILE DETAILS ****END*****

      //REMOVE ERROR/SUCCESS MESSAGES
      function remove_message(){
        $("#currentpass").removeClass("is-invalid");
        $("#newpass").removeClass("is-invalid");
        $("#confirmpass").removeClass("is-invalid");
        $("#alert-success").addClass("d-none");
        $("#alert-error").addClass("d-none");
      }//REMOVE ERROR/SUCCESS MESSAGES **END**

      function change_title(title){
        document.title=(title+' | HUREMAS - CvSU Imus');
      }

      //JQUERY
      $(document).ready(function() {

        //REFRESH INBOX
        $('#refresh_inbox').click(function(e){
          e.preventDefault();
          $("#inbox-content").removeClass("d-none"); // SAMPLE ONLY
          $("#no_notif").addClass("d-none"); // HIDE NO MESSAGE
        });
        //REFRESH INBOX **END**

        //CLEAR
        $('#clear').click(function(e){
          //REMOVE CLASSES
          remove_message();
        });//CLEAR **END**

        //CHANGE PASSWORD
        $('#change').submit(function(e){
          e.preventDefault();
          //INITIALIZATION > SANITIZE DATA
          var currentpass = $("#currentpass").val().trim();
          var newpass = $("#newpass").val().trim();
          var confirmpass = $("#confirmpass").val().trim();
          remove_message(); //REMOVE CLASSES

            $.ajax({
            type: 'POST',
            url: 'function/change_password.php',
            data:{currentpass:currentpass,newpass:newpass,confirmpass:confirmpass},
            dataType: 'json',
            success: function(response){
              if(response.error_current){
                $("#currentpass").addClass("is-invalid");
                $("#current-invalid").html(response.error_current);
              }
              else if(response.error_new){
                $("#newpass").addClass("is-invalid");
                $("#new-invalid").html(response.error_new);
              }
              else if(response.error_confirm){
                $("#confirmpass").addClass("is-invalid");
                $("#confirm-invalid").html(response.error_confirm);
              }
              else if(response.error){
                $("#alert-error").removeClass("d-none");
                $("#error-message").html(response.error);
              }
              else{
                $("#alert-success").removeClass("d-none");
                $("#success-message").html(response.success);
                $('#change')[0].reset(); //RESET FORM AFTER SUCCESS UPDATE :)  UwU
              }
            }  
          });
        });//CHANGE PASSWORD **END**


        // STORE ACTIVE TAB (INCASE USER RELOAD THE PAGE IT RETURNS TO ACTIVATED TAB) :) UWU
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            sessionStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = sessionStorage.getItem('activeTab');
        if(activeTab){
            $('#profile_tab a[href="' + activeTab + '"]').tab('show');
        }
        //ACTIVE TAB **END**

        



      });//JQUERY **END**

      //EXECEUTE GET PROFILE FUNCTION
      get_profile();





    </script>
   
</body>
</html>


