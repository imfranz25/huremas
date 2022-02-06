<?php 
$title="Profile";
require_once '../includes/path.php';
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
  .link{
    cursor: pointer;
  }

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
                  <img class="img-radius m-2" src="<?php echo $global_link; ?>/Portal/admin/images/<?php echo (!empty($user['photo']))?$user['photo']:'profile.jpg'; ?>" width="150" height="150" alt="User-Profile-Image">
                </div>    
                <h5 class="text-center text-white"><?php echo $user['firstname']; ?></h5>    
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
                    <i class="ti-bell mr-2" aria-hidden="true"></i>Notifications
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
              
                <!--Personal Details -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label"></label>
                  <div class="col-lg-6">
                    <h5>Personal Details</h5>
                  </div> 
                </div>
                <!--Employee ID -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Employee ID</label>
                  <div class="col-lg-6">
                    <input type="text" id="employeeid" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Full Name -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Full Name</label>
                  <div class="col-lg-6">
                    <input type="text" id="fullname" class="form-control"readonly> 
                  </div> 
                </div>
                <!--Birthdate -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Birthdate</label>
                  <div class="col-lg-6">
                    <input type="text" id="birthdate" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Age -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Age</label>
                  <div class="col-lg-6">
                    <input type="text"  id="age" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Sex -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Sex</label>
                  <div class="col-lg-6">
                    <input type="text" id="sex" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Religion -->
                <!-- <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Religion</label>
                  <div class="col-lg-6">
                    <input type="text" name="religion" id="religion" class="form-control" readonly> 
                  </div> 
                </div> -->
                <!--Civil Status -->
                <!-- <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Civil Status</label>
                  <div class="col-lg-6">
                    <input type="text" name="civilstatus" id="civilstatus" class="form-control" readonly> 
                  </div> 
                </div> -->
                <!--Contact Details -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label"></label>
                  <div class="col-lg-6">
                    <h5 class="mt-3">Contact Details</h5>
                  </div> 
                </div>
                <!--Address -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Address</label>
                  <div class="col-lg-6">
                    <input type="text" id="address" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Contact Number -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Contact Number</label>
                  <div class="col-lg-6">
                    <input type="text" id="contact" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Mobile Number -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Mobile Number</label>
                  <div class="col-lg-6">
                    <input type="text"  id="mobile" class="form-control" readonly> 
                  </div> 
                </div>
                <!--Email Address -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Email Address</label>
                  <div class="col-lg-6">
                    <input type="email"  id="email" class="form-control" readonly> 
                  </div> 
                </div>

                <!--Employee Details -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label"></label>
                  <div class="col-lg-6">
                    <h5 class="mt-3">Employee Details</h5>
                  </div> 
                </div>
                <!--Position -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Position</label>
                  <div class="col-lg-6">
                    <input type="text"  id="position" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Department -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Department</label>
                  <div class="col-lg-6">
                    <input type="text"  id="department" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Schedule -->
                <!--<div class="row d-flex m-3">-->
                <!--  <label class="col-lg-2 col-form-label">Schedule</label>-->
                <!--  <div class="col-lg-6">-->
                <!--    <input type="text"  id="schedule" class="form-control" readonly> -->
                <!--   </div> -->
                <!--</div>-->
                <!--Category -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Category</label>
                  <div class="col-lg-6">
                    <input type="text"  id="category" class="form-control" readonly> 
                   </div> 
                </div>

                <!--Goverment -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label"></label>
                  <div class="col-lg-6">
                    <h5 class="mt-3">Government Issued ID</h5>
                   </div> 
                </div>
                <!--SSS -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">SSS Number</label>
                  <div class="col-lg-6">
                    <input type="text"  id="sss" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Pag-ibig -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Pagi-ibig Number</label>
                  <div class="col-lg-6">
                    <input type="text"  id="pagibig" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Philhealth -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Philhealth Number</label>
                  <div class="col-lg-6">
                    <input type="text"  id="philhealth" class="form-control" readonly> 
                   </div> 
                </div>
                <!--TIN -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">TIN Number</label>
                  <div class="col-lg-6">
                    <input type="text"  id="tin" class="form-control" readonly> 
                   </div> 
                </div>
                
                <!--Account -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label"></label>
                  <div class="col-lg-6">
                    <h5 class="mt-3">Account Details</h5>
                   </div> 
                </div>
                <!--Username -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Username</label>
                  <div class="col-lg-6">
                    <input type="text"  id="username" class="form-control" readonly> 
                   </div> 
                </div>
                <!--Password -->
                <div class="row d-flex m-3">
                  <label class="col-lg-2 col-form-label">Default Password</label>
                  <div class="col-lg-6">
                    <input type="text"  id="password" class="form-control" readonly> 
                    <div class="input-group-append">
                      <span class="input-group-text text-info">
                        <label><i class="fa fa-info-circle"></i> Note : Please change your password for the first time login.</label> 
                      </span>
                    </div>
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
                <h5>Notification</h5>
              </div> 
              <div class="card-block">

                <!-- Inbox Sample *-->
                <div id="inbox-content">
                  <!-- Inbox Table-->
                  <div class="table-responsive" style="max-height : 500px;">
                    <table class="table table-hover" style="overflow: auto;">
                      <tbody id="notif-body">
                        <!-- Notif Infos Here    -->
                      </tbody>            
                    </table>            
                  </div>
                  <!-- Inbox Table **End**-->
                </div>
                <!-- Inbox Sample **End**-->

                <!--No Notification Message > Visible By Default-->
                <div id="no_notif" class="row m-auto d-none">
                  <div class="col-lg-12 p-3 text-center">
                    <img src="../assets/images/no_notif.png" alt="No Notification" class="img-radius img-fluid mx-auto d-block p-4">
                    <h5>YOU HAVE NO NOTIFICATION AT A MOMENT</h5>
                    <label>When you have notification they show up here. Stay Tune for updates !</label>
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto mb-3 mt-3" id="refresh_inbox" name='refresh'>Refresh</button>
                  </div>
                </div>
                <!--No Notification Message End-->



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
                      <input type="reset" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center mb-3 mt-3 mx-auto" id="clear_setting" name="clear" value="Clear" />
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


    <!-- Delete -->
    <div class="modal fade" id="deleteNotif">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"><b><span>Delete Notification</span></b></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="POST" id="notif_form">
                    <input type="hidden" id="notif_id" name="id">
                    <div class="text-center">
                        <label>Are you sure you want to delete this notification ? </label>
                        <div class="text-center text-danger" >
                          <i class="fa fa-exclamation-circle mx-1" aria-hidden="true"></i>
                          <label> Note: This process cannot be undone</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                  <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
                  </form>
                </div>
            </div>
        </div>
    </div>






    <?php include 'includes/scripts.php'; ?>
 
    <script>

      //GET AGE
      function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

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
            $('#age').val(getAge(response.birthdate));
            $('#mobile').val(response.mobile_no);
            $('#department').val(response.title);
            //$('#schedule').val(response.time_in+' - '+response.time_out);
            $('#category').val(response.cat);
            //gov id
            $('#sss').val(response.sss_id);
            $('#pagibig').val(response.pagibig_id);
            $('#philhealth').val(response.philhealth_id);
            $('#tin').val(response.tin_num);
            //account
            $('#username').val(response.username);
            $('#password').val(response.default_password);
            //religion
            //civil status
          }  
        });
      }//GET PROFILE DETAILS ****END*****


      //GET NOTIF
      function get_notification(){
        $("#notif-body").html("");
        $.ajax({
          type: 'POST',
          url: 'function/notification_row.php',
          dataType: 'json',
          success: function(response){
           if (response.length > 0 ) {
            $("#inbox-content").removeClass("d-none"); // SAMPLE ONLY
            $("#no_notif").addClass("d-none"); // HIDE NO MESSAGE
            $("#clear").removeClass("d-none");
            
            for (var i = 0; i < response.length; i++) {
              let bold = '';
              if ((response)[i].bell) {}
              $("#notif-body").append(`
                <tr>
                  <td class="align-middle link" 
                    data-link="${(response)[i].link}" 
                    data-open="${(response)[i].open}"
                    data-id="${(response)[i].nid}">
                    <i class="fa fa-bell mx-2 ${(response)[i].bell}"></i>
                    <span class="text-dark" style="font-weight:bold;">
                      ${(response)[i].title}
                    </span>
                  </td>
                  <td class="text-muted align-middle link" 
                    data-link="${(response)[i].link}" 
                    data-open="${(response)[i].open}"
                    data-id="${(response)[i].nid}">
                    ${(response)[i].date}
                  </td>
                  <td class="align-middle">
                    <a href="javascript:void(0)" data-id="${(response)[i].nid}" class="delete_notif text-danger"><i class="fa fa-trash m-1 float-right"></i></a>
                  </td>
                </tr> 
              `);
            }


           }else{
            $("#inbox-content").addClass("d-none"); // HIDE TABLE
            $("#no_notif").removeClass("d-none"); // NO NOTIF
            $("#clear").addClass("d-none");
           }
          }  
        });
      }//GET NOTIF ****END*****

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

      function update_openlink(id,link){
        let url = window.location.href;
        $.ajax({
          type: 'POST',
          url: '<?php echo $global_link; ?>/Portal/employee/function/notification_edit.php',
          data: {id:id},
          dataType: 'json',
          success: function(response){
            if(response=='1'){
              location.replace(link);
            }else{
              location.replace(url);
            }
          }  
        });
      }

      //JQUERY
      $(document).ready(function() {

        //REFRESH INBOX
        $('#refresh_inbox').click(function(e){
          e.preventDefault();
          //$("#inbox-content").removeClass("d-none"); // SAMPLE ONLY
          //$("#no_notif").addClass("d-none"); // HIDE NO MESSAGE
          get_notification();
        });
        //REFRESH INBOX **END**

        //CLEAR
        $('#clear_setting').click(function(e){
          //REMOVE CLASSES
          remove_message();
        });//CLEAR **END**

        // CLICKED LINK
        $(document).on('click','.link',function(e){
          e.preventDefault();
          let link = $(this).data('link');
          let open = $(this).data('open');
          let id = $(this).data('id');
          if (open==0) {
            update_openlink(id,link);
          }else{
            location.replace(link);
          }
        });

        $(document).on('click','.delete_notif',function(e){
          e.preventDefault();
          $('#notif_id').val($(this).data('id'));
          $('#deleteNotif').modal('show');
        });

        $(document).on('submit','#notif_form',function(e){
          e.preventDefault();
          //let url = window.location.href;
          let id = $('#notif_id').val();
          $.ajax({
            type: 'POST',
            url: '<?php echo $global_link; ?>/Portal/employee/function/notification_delete.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
              window.location.reload();
            }  
          });
        });

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
      get_notification();
      



    </script>
   
</body>
</html>


