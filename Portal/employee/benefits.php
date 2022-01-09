<?php 
$title ="Benefits";
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/header.php");
?>
  <body>
   <?php require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/preloader.php"); ?>
  
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
                                          <li class="breadcrumb-item"><a href="benefits.php">Benefits</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">


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
                            <div class="card mb-0 ">    
                              <div class="card-header">
                                <ul class="breadcrumb-title">
                                  <li class="breadcrumb-item">
                                    <a class="reload_card" href="javascript:void(0)"><h5>Benefits</h5></a>
                                  </li>
                                  <!--Filter here-->
                                </ul>
                                <div class="card-header-right">
                                  <ul class="list-unstyled card-option">
                                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-refresh reload_card"></i></li>
                                  </ul>
                                </div>
                              </div>         
                              <div class="box-body" id="job_data" style="height: 500px;">
                                <div class="card-block table-border-style row text-justify mh-100" style="overflow-y: scroll !important;overflow-x: hidden !important;">
                                  <!--PHP Start-->
                             
                                  <!--No Job Post-->
                                  <div class="row m-auto">
                                    <div class="col-lg-12 p-3 text-center">
                                      <img src="../assets/images/under_development.png" alt="No Notification" class="img-radius img-fluid mx-auto d-block" style="width: 30%;">
                                      <h5>BENEFITS - UNDER DEVELOPMENT</h5>
                                      <label>Sorry for inconvenience</label>
                                      <button type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto mb-3 mt-3 reload_card">Refresh</button>
                                    </div>
                                  </div>
                                  <!--No Job Post End-->

                                 
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


      require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/alert_modal.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/scripts.php");

    ?>   


<script>


  $(document).ready(function() {


    // CHECK IF THERE IS STILL MODAL OPEN => TO SUPPORT SCROLLING EVEN IF WE CLOSE THE MODAL
    $('body').on('hidden.bs.modal', function () {
      if($('.modal.show').length > 0){
        $('body').addClass('modal-open');
      }
    });

  });

</script>

</body>
</html>

