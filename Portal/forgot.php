<?php session_start();
if(isset($_SESSION['id'])){
  if ($_SESSION['type'] == 'admin') {
    header('location:admin/index.php');
  }else{
    header('location:employee/index.php');
  }    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password | HUREMAS - CvSU Imus</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->

      <link rel="icon" href="assets/images/Tabicon.ico" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body style="background-image: url('assets/images/cvsubanner.jpg');background-repeat: no-repeat;background-size: 100% 250px;" >


  <!-- Pre-loader start -->
  
        <?php include 'includes/preloader.php'; ?>
  <!-- Pre-loader end -->
  

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form action="reset.php" class="md-float-material form-material" method="POST" > 
                            <div class="text-center">
                                <img src="assets/images/huremaslogo.png" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Forgot Password</h3>
                                        </div>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="username" class="form-control" required autofocus>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Username</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="text" name="email" class="form-control" required autofocus>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Email</label>
                                    </div>
     
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                  
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" name='reset'>Reset</button>

                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left"><a href="index.php"><b>< Back</b></a></p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<b><p>".$_SESSION['error']."</p> </b>
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  		if(isset($_SESSION['success'])){
  			echo "
  				<div class='callout callout-success text-center mt20'>
			  		<b><p>".$_SESSION['success']."</p> </b>
			  	</div>
  			";
  			unset($_SESSION['success']);
  		}
  	?>
</div>

<!-- Warning Section Ends -->
<!-- Required Jquery -->
<?php include 'includes/scripts.php' ?>


</body>

</html>
