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
  <title>Login | HUREMAS - CvSU Imus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Welcome to HUREMAS Portal" />
  <meta name="keywords" content="portal, huremas, cvsuic" />
  <meta name="author" content="Francis Ong, Ran Bellon" />
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
  <?php include_once 'includes/preloader.php'; ?>
  <!-- Pre-loader end -->
  

  <section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <!-- Authentication card start -->
          <form action="login.php" class="md-float-material form-material" method="POST" > 
            <div class="text-center">
                <img src="assets/images/huremaslogo.png" alt="logo.png">
            </div>
            <div class="auth-box card">
              <div class="card-block">
                <div class="row m-b-20">
                  <div class="col-md-12">
                    <h3 class="text-center">Sign In</h3>
                  </div>
                </div>
                <!-- Username -->
                <div class="form-group form-primary">
                  <input type="text" name="username" class="form-control" required autofocus>
                  <span class="form-bar"></span>
                  <label class="float-label">Username</label>
                </div>
                <!-- Password -->
                <div class="form-group form-primary">
                  <div class="input-group" id="show_hide_password">
                    <input type="password" name="password" class="form-control" required>
                    <div class="input-group-addon">
                      <a href=""><i class="fa fa-eye-slash text-white" aria-hidden="true"></i></a>
                     <span class="form-bar"></span>
                    </div>
                    <label class="float-label">Password</label>
                  </div>
                </div>
                <!-- Forgot Password -->
                <div class="row m-t-25 text-left">
                  <div class="col-12">
                    <div class="forgot-phone text-right f-right">
                      <a href="forgot.php" class="text-right f-w-600"> Forgot Password?</a>
                    </div>
                  </div>
                </div>
                <!-- Sign in Butn -->
                <div class="row m-t-30">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" name='login'>Sign in</button>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-10">
                    <p class="text-inverse text-left">
                      <a href="../Home/index.php"><b>< Back</b></a>
                    </p>
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

  <!-- SESSION ERROR MESSAGE -->
  <?php
		if(isset($_SESSION['error'])):
  ?>
		<div class='callout callout-danger text-center mt20'>
  		<b><p><?php echo $_SESSION['error']; ?></p> </b>
  	</div>
	<?php unset($_SESSION['error']); endif; ?>

  <?php require_once 'includes/scripts.php' ?>

<!-- Show Password -->
<script>
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
      event.preventDefault();
      if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
      }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
      }
    });
  });
</script>

</body>

</html>
