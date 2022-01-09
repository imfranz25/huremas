<?php 
$title = 'Job Offerings';
include '../includes/head.php'; 
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/conn.php");
?>

<body>

  <!--Top Header-->
  <?php include '../includes/top-header.php'; ?>
    <!--Header-->
  <?php include '../includes/header.php'; ?>


    <div class="container-fluid m-auto mb-md-5">
      <div class="row mt-4 mx-2">
        <div class="m-auto text-center text-white bold my-5 py-md-5 col-md-12">
          <h1 class="font-weight-bold display-4 text-warning">Elevate your Career</h1>
          <h1 class="font-weight-bold display-4">
            #GrowWith<label class="theme">CVSU</label>
          </h1>
        </div>
      </div>
    </div>

  </div>

  <!-- special section -->
  <section class="special_section special" style="text-shadow: 2px 1px black;">
    <div class="container">
      <a href="#recent" class="text-decoration-none">
        <div class="special_container">
          <div class="box b1 bg-theme m-0 p-0 d-inline-block d-lg-flex" style="height: 80px;">
            <div class="float-right float-lg-none">
              <img class="img-60 mx-lg-3" src="/HUREMAS/Home/assets/images/acad.png" alt="Academic Personnel"/>
            </div>
            <div class="detail-box h-100 d-flex align-items-center">
              <h3>Academic</h3>
            </div>
          </div>

          <div class="box b2 bg-theme m-0 p-0 d-inline-block d-lg-flex" style="height: 80px;">
            <div class="float-right float-lg-none">
              <img class="img-60 mx-lg-3" src="/HUREMAS/Home/assets/images/admin.png" alt="Administration Personnel"/>
            </div>
            <div class="h-100 d-flex align-items-center">
              <h3>Administration</h3>
            </div>
          </div>

           <div class="box b1 bg-theme m-0 p-0 d-inline-block d-lg-flex" style="height: 80px;">
            <div class="float-right float-lg-none">
              <img class="img-80 mx-lg-3" src="/HUREMAS/Home/assets/images/non.png" alt="Non-Academic Personnel"/>
            </div>
            <div class="h-100 d-flex align-items-center">
              <h3>Non-Academic</h3>
            </div>
          </div>
        </div>
      </a>
    </div>
  </section>

  <section id="recent" style="min-height: 100vh;">
    <div class="container">
      <div class="row my-5">
        <div class="col-md-12 mb-5">

          <h1 class="text-center text-gray-dark display-3 font-weight-bold my-5">
            Our Recent <label class="text-warning">Job Hirings</label>
          </h1>
          <!--Job Post-->
          <div class="row">

          <?php
            $show_count = 0;
             $sql = "SELECT *, (SELECT COUNT(stage) FROM  applicant WHERE (stage='On-Board' OR stage='Hired') AND applicant.job_code=job.job_code) AS hired FROM job WHERE job_status != 'inactive' ORDER BY job_date DESC ";
            $query = $conn->query($sql);
            if ($query->num_rows > 0) {                    
              while($row = $query->fetch_assoc()){
                if ($row['hired']>=$row['job_recruit']) {
                  continue;
                }
                $show_count +=1;
                //code     
                $url_code = password_hash($row['job_code'],PASSWORD_DEFAULT);                      
            ?>
            <!--Sample Recuit Box-->
            <div class="col-md-6 col-lg-4 mt-4">
              <div class="card border p-3 h-100" style="box-shadow: 2px 2px 20px green;border-radius: 30px;">
                <div class="card-body row">
                  <div class="col-md-12">
                    <h2 class="font-weight-bold"><?php echo $row['job_title']; ?></h2>
                    <ul>
                      <li><?php echo $row['job_term']; ?></li>
                      <li><?php echo $row['job_type']; ?></li>
                      <li><?php echo $row['job_exp']; ?></li>
                    </ul>
                  </div>
                </div>
                <div class="mx-3 mb-2">
                  <a type="button" class="btn bg-warning text-white font-weight-bold f-13 p-2 px-3 float-right" href='job-posted.php?job_code=<?php echo $url_code;?>' style='border-radius: 40px;'><i class="fa fa-id-card mr-1"></i>Apply Now !</a>
                </div>
              </div>
            </div>
            <?php }?>
          <!--Job Post End-->
        <?php }if ($show_count < 1){ ?>

          <!--No Job Post-->
            <div class="col-lg-12 p-3 text-center">
              <img src="/HUREMAS/Portal/assets/images/jobpost.jpg" alt="No Notification" class="rounded-circle img-fluid mx-auto d-block p-4 w-50">
              <h5>THEIR ARE NO ACTIVE JOB POSTING AT THE MOMENT</h5>
              <label>Stay tune for updates or leave us a message  through email</label>
              <button type="button" class="btn btn-warning btn-md btn-block waves-effect waves-light text-center w-25 d-block mx-auto text-white mb-3 mt-3 font-weight-bold reload_card">Refresh</button>
            </div>

        <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!--footer-->
  <?php include '../includes/footer.php'; ?>

  <script>
    $(document).ready(function() {

      //Reload JOB
      $(document).on('click', '.reload_card', function(e) {
        //loading
        $('#recent').html('<img class="img-radius img-fluid mx-auto d-block p-4 w-50 mb-5" src="/HUREMAS/Portal/admin/images/job_load.gif" />');
        $("#recent").load(location.href+" #recent>*","");
      }); 

    }); 
  </script>

</body>

</html>

