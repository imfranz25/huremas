<?php
isset($_GET['job_code'])?$code = $_GET['job_code']:header('location:jobs.php');
$title = 'Job Application';
include '../includes/head.php'; 
require_once($_SERVER['DOCUMENT_ROOT']."/HUREMAS/Portal/admin/includes/conn.php");
?>
<body>

  <!--Override Hero_area style-->
  <style>
    .hero_area{
      background:linear-gradient(0deg, rgba(4, 7, 22, 0.8), rgba(4, 7, 32, 0.8)), url(../assets/images/camp_rev.png);
      height: 100vh;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      border-radius: 0 0 150px 150px;
    }
    .desc {
       text-align: justify;
       white-space: pre-wrap;       /* css-3 */
       white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
       white-space: -pre-wrap;      /* Opera 4-6 */
       white-space: -o-pre-wrap;    /* Opera 7 */
       word-wrap: break-word;       /* Internet Explorer 5.5+ */
    }
  </style>

  <!--Check Code If Valid/Active-->
  <?php
    $verify = false;
    $sql = "SELECT *, (SELECT COUNT(stage) FROM  applicant WHERE (stage='On-Board' OR stage='Hired') AND applicant.job_code=job.job_code ) AS hired FROM job WHERE job_status != 'inactive' ";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
      if ($row['hired']>=$row['job_recruit']) {
        continue;
      }
      if (password_verify($row['job_code'], $code)) {
        $verify = true;
        $job_code = $row['job_code'];
        $job_title = $row['job_title'];
        $job_term = $row['job_term'];
        $job_type = $row['job_type'];
        $job_exp = $row['job_exp'];
        break;
      }
    }
    if ($verify != true) {
      header('location:jobs.php');
    }
  ?>

  <!--Top Header-->
  <?php include '../includes/top-header.php'; ?>
    <!--Header-->
  <?php include '../includes/header.php'; ?>


    <div class="container-fluid mb-md-5">
      <div class="row mx-2">
        <div class="text-center text-white bold my-5 col-md-12 row">
          <div class="col-md-12 ml-4">
            <a href="jobs.php">
              <h5 class="font-weight-bold text-warning float-left">
                <i class="fas fa-arrow-alt-circle-left mr-2"></i>Back to <label class="theme" style="cursor: pointer;">Job Offerings</label>
              </h5>
            </a>
          </div>
          <div class="col-md-12 mt-3 ml-4">
            <h1 class="font-weight-bold float-left text-left text-break w-75 display-4">
            <?php echo $job_title; ?>
            <ul class="font-weight-normal ml-3 h5 mt-3">
              <li><?php echo $job_term; ?></li>
              <li><?php echo $job_type; ?></li>
              <li><?php echo $job_exp; ?></li>
            </ul>
            <div>
              <a type="button" class="btn bg-warning text-white font-weight-bold p-2 px-4 apply_now" data-id='<?php echo $row['job_code']; ?>' style='border-radius: 40px;'><h5 class="font-weight-bold"><i class="fa fa-id-card mr-1"></i>Apply Now !</h5></a>
            </div>
            </h1>
          </div>
        </div>
      </div>
    </div>
    

  </div>




  <section id="recent">
    <div class="container">
      <div class="row my-5">
        <div class="col-md-12 mb-5">
          <!--Job Post-->
          <div class="row">
            <!--PHP Start-->
            <?php                       
              $sql = "SELECT * FROM job LEFT JOIN position ON position.id=job.job_position LEFT JOIN department_category ON department_category.id=job.job_dept WHERE job_code = '$job_code' ";

              $query = $conn->query($sql);
              $row = $query->fetch_assoc(); 

            ?>
            <!--Sample Recuit Box-->
            <div class="col-lg-12 mt-2">
              <div class="card border p-3" style="box-shadow: 2px 2px 20px green;border-radius: 30px;">
                <div class="card-body row">
                  <div class="col-md-12 mb-5">
                    <h2 class="font-weight-bold"><?php echo $row['job_title']; ?></h2>
                    <hr class="divider" />
                    <h2 class="h5">Position : <?php echo $row['description'];  ?></h2>
                    <h2 class="h5">Experience : <?php echo $row['job_exp'];  ?></h2>
                    <h2 class="h5">Salary Grade : <?php echo $row['job_grade'];  ?></h2>
                    <h2 class="h5">Department / Unit : <?php echo $row['title'];  ?></h2>
                    <h2 class="h5">Contract : <?php echo $row['job_term'];  ?></h2>
                    <h2 class="h5">Working Hours : <?php echo $row['job_type'];  ?></h2>
                  </div>
                  <div class="col-md-12">
                    <h4 class="text-gray-dark h4 font-weight-bold">
                      Job <label class="text-warning">Description</label>
                    </h4>
                    <p class="h5 desc"><?php echo $row['job_desc'];  ?></p>
                  </div>
                  <div class="col-md-12">
                    <h4 class="text-gray-dark h4 font-weight-bold mt-4">
                      About <label class="theme" style="text-shadow: none;">Cavite State University - Imus</label>
                    </h4>
                    <p class="h5 text-justify">
                      Cavite  State  University’s  vision  of  being  the  premier university  in  historic  Cavite,  prompted  the  launching  of the  College  of  Business  and  Entrepreneurship  in  Imus  on August 15, 2003. By  virtue  of  the  Memorandum  of  Agreement  among  the Cavite  Provincial  Governor,  Erineo  “Ayong”  Maliksi,  Imus Municipality  Mayor,  Homer  Saquilayan  and  University President,  Dr.  Ruperto  Sangalang,  the  use  of  the  building which  was  originally  proposed  to  be  the  Cavite  Convention and  Trade  Center,  was  granted  to  the  college  for  it  to operate.
                    </p>
                  </div>
                  <div class="col-md-12">
                    <h4 class="text-gray-dark h4 font-weight-bold mt-4">
                      Interested?
                    </h4>
                    <p class="h5 text-justify">Click the Apply button, attach your CV/Resume, and complete the required details! For more information and queries regarding with the job details kindly send us a message through email <a href="mailto:hrdoimus@cvsu.edu.ph" class="text-success">hrdoimus@cvsu.edu.ph</a>. Thank You !</p>
                  </div>
                </div>
                <div class="mx-auto my-4">
                  <a type="button" class="btn bg-warning text-white font-weight-bold p-2 px-4 float-right my-3 apply_now" data-id='<?php echo $row['job_code']; ?>' style='border-radius: 40px;'><h4>Apply Now !</h4></a>
                </div>
              </div>
            </div>

          </div>
          <!--Job Post End-->
        </div>
      </div>
    </div>
  </section>


 <!--===============Recent Jobs Section===============--->
  <!--PHP Start-->
  <?php
 
   $sql = "SELECT *, (SELECT COUNT(stage) FROM  applicant WHERE (stage='On-Board' OR stage='Hired') AND applicant.job_code=job.job_code ) AS hired FROM job WHERE job_code != '$job_code' AND job_status != 'inactive' ORDER BY job_date DESC ";
    $query1 = $conn->query($sql);
    $query2 = $conn->query($sql);
    $count = 0;

    //manual count of data to verify onboarded/hired
    while($row = $query1->fetch_assoc()){  
      if ($row['hired']>=$row['job_recruit']) {
        continue;
      }
      $count+=1;
    }
    
    $col = ($count == 1) ? 'col-lg-8' : 'col-lg-4';
    if ($count > 0) {
  ?>
  <section class="quality layout_padding mb-5">
    <div class="container row">
        <div class="col-md-12 col-lg-4 mx-0 px-0 my-auto text-lg-left">
          <h1 class="display-4">Most Recent <label class="text-warning">Jobs</label></h1>
        </div>

            <?php
                $limit =0;                       
                while($row = $query2->fetch_assoc()){     
                  if ($row['hired']>=$row['job_recruit']) {
                    continue;
                  }
                  //limit 2
                  if ($limit==2) {
                    break;
                  }
                  $limit +=1;  
                $url_code = password_hash($row['job_code'],PASSWORD_DEFAULT);                      
            ?>
            <!--Sample Recuit Box-->
            <div class="col-md-6 <?php echo $col; ?> text-dark text-left p-3">
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

    </div>
  </section>
  <!-- quality policy section -->

   <?php }?>

  <!--Contact-->
  <?php include_once '../includes/contact.php'; ?>

  <!--footer-->
  <?php include_once '../includes/footer.php'; ?>

  <!--Applicant Form-->
  <?php include '../includes/job_modal.php'; ?>


  <script>

    //CHECK IF FILE IS VALID
    function check_file(file_input) {
        //valid extension 
        const valid_file = ['pdf', 'docx', 'doc', 'docm', 'dot', 'docm', 'dotx'];
        if (file_input.type == "file") {
            //get value and extension
            const file_name = file_input.value;
            const extension = file_name.substr((file_name.lastIndexOf('.') +1));
            if (file_name.length > 0) { //check if there is selected file
              var file_size = file_input.files[0].size/1024/1024; //file size in MB
              if (file_size <= 5){ // Maximum of 5MB Image Upload
                if(!valid_file.includes(extension)){ // check if extension is valid
                  file_input.value = '';
                  $('#fullModal').modal('show');
                  $('#warn_msg').html('Invalid file format !');
                }
              }else{
                file_input.value = '';
                $('#fullModal').modal('show');
                $('#warn_msg').html('The attachment size exceeds the allowable limit !');
              }
            }
        }
        return true;
    }

    $(document).ready(function() {

      //APPLY JOB
      $(document).on('click', '.apply_now', function(e) {
        var code = $(this).attr('data-id');
        $('#add_app_code').val(code);
        $('#newApp').modal('show');
        $('#form_add_candidate')[0].reset();    
      }); 

      //SUBMIT APPLICATION FORM
      $( "#form_add_candidate" ).submit(function(e) {
        e.preventDefault();
        var code = $('#add_app_code').val();
        //get inputs
        var form_data = new FormData($('#form_add_candidate')[0]);
        $.ajax({
            url: '/HUREMAS/Portal/admin/function/candidate_add.php',  
            dataType: 'json',  
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'POST',
            success: function(response){
                if (response=='1'){ // 1 Successful
                  $('#successModal').modal('show');
                  $('#success_msg').html('Application sent succesfully');
                  // reload page (redirect to new candidate)
                  $(".tab_code").removeClass('active');
                  $("#candiTab").addClass('active');
                  //hide modal
                  $("#newApp").modal('hide');
                }else if (response=='2'){ // 2 maximum size limit
                  $('#fullModal').modal('show');
                  $('#warn_msg').html('The attachment size exceeds the allowable limit !');
                }else if (response=='3'){ // 3 invalid format
                  $('#fullModal').modal('show');
                  $('#warn_msg').html('Invalid file format !');
                }else{ // failed
                  $('#errorModal').modal('show');
                  $('#error_msg').html('Application failed');
                }
            }
         });
      
      });


    }); 
  </script>

</body>

</html>

