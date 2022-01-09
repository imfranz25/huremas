<?php 
$title = 'Home';
session_start();
include 'includes/conn.php';
include 'includes/head.php'; 
?>

<body>

  
    <!--Top Header-->
    <?php include 'includes/top-header.php'; ?>
    <!--Header-->
    <?php include 'includes/header.php'; ?>



    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <h6>WELCOME TO</h6>
                      <h1 class="theme">HUREMAS</h1>
                      <h2>CAVITE STATE UNIVERSITY</h2>
                      <h6>IMUS CAMPUS</h6>
                      <a href="">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <h6>WELCOME TO</h6>
                      <h1 class="theme">HUREMAS</h1>
                      <h2>CAVITE STATE UNIVERSITY</h2>
                      <h6>IMUS CAMPUS</h6>
                      <a href="">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <h6>WELCOME TO</h6>
                      <h1 class="theme">HUREMAS</h1>
                      <h2>CAVITE STATE UNIVERSITY</h2>
                      <h6>IMUS CAMPUS</h6>
                      <a href="">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden" >Next</span>
      </button>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- special section -->

  <section class="special_section mb-5">
    <div class="container ">
      <div class="special_container">
        <div class="box b1 bg-theme">
          <div class="img-box">
            <img src="assets/images/award.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              BEST <br />
              INDUSTRY LEADERS
            </h4>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box b2 bg-theme">
          <div class="img-box">
            <img src="assets/images/study.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              JOB <br />
              OPPURTUNITIES
            </h4>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box b3 bg-theme">
          <div class="img-box">
            <img src="assets/images/books-stack-of-three.png" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              QUALITY <br />
              EDUCATION
            </h4>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end special section -->

  <!-- about section -->
  <section class="about_section layout_padding mb-5">
    <div class="side_img">
      <img src="assets/images/side-image.png" alt="" />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img_container">
            <div class="img-box b1">
              <img src="assets/images/cvsu-imus.jpg" alt="" />
            </div>
            <div class="img-box b2">
              <img src="assets/images/toga.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h3>
                About Cavite State University - Imus
              </h3>
              <p style="text-align: justify;">
                Cavite  State  University’s  vision  of  being  the  premier university  in  historic  Cavite,  prompted  the  launching  of the  College  of  Business  and  Entrepreneurship  in  Imus  on August 15, 2003. By  virtue  of  the  Memorandum  of  Agreement  among  the Cavite  Provincial  Governor,  Erineo  “Ayong”  Maliksi,  Imus Municipality  Mayor,  Homer  Saquilayan  and  University President,  Dr.  Ruperto  Sangalang,  the  use  of  the  building which  was  originally  proposed  to  be  the  Cavite  Convention and  Trade  Center,  was  granted  to  the  college  for  it  to operate.
              </p>
              <a href="" >
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- course section -->

  <section class="course_section layout_padding-bottom">
    <div class="side_img">
      <img src="assets/images/side-image.png" alt="" />
    </div>
    <div class="container">
      <div class="heading_container">
        <h3>
          Faculty
        </h3>
        <p>
          Click the faculty for more information
        </p>
      </div>
      <div class="course_container">
        <div class="course_content">
          <div class="box">
            <img src="assets/images/cs.jpg" class="height-fit" alt="" />
            <a href="" class="">
              <img src="assets/images/link.png" alt="" />
            </a>
            <h5>
              Department of<br />
              Computer Studies
            </h5>
          </div>
          <div class="box">
            <img src="assets/images/mag.png" class="height-fit" alt="" />
            <a href="" class="">
              <img src="assets/images/link.png" alt="" />
            </a>
            <h5>
              Department of<br />
              Management
            </h5>
          </div>
        </div>
        <div class="course_content">
          <div class="box">
            <img src="assets/images/sci.jpg" class="height-fit" alt="" />
            <a href="" class="">
              <img src="assets/images/link.png" alt="" />
            </a>
            <h5>
              Department of Social<br />
              Science And Humanities
            </h5>
          </div>
          <div class="box">
            <img src="assets/images/phy.jpg" class="height-fit" alt="" />
            <a href="" class="">
              <img src="assets/images/link.png" alt="" />
            </a>
            <h5>
              Physical<br />
              Education Department
            </h5>
          </div>
          <div class="box">
            <img src="assets/images/hos.jpg" class="height-fit" alt="" />
            <a href="" class="">
              <img src="assets/images/link.png" alt="" />
            </a>
            <h5>
              Department of<br />
              Hospitality Management
            </h5>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end course section -->

  <!-- quality policy section -->
  <section class="quality layout_padding mb-5">
    <div class="container">
        <h1>Quality Policy</h1>
        <p>We Commit to the highest standards of education, value our stakeholders, Strive for continual improvement of our products and services, and Uphold the University’s tenets of Truth, Excellence, and Service to produce globally competitive and morally upright individuals.</p>
    </div>
  </section>
  <!-- quality policy section -->

  <!-- event section -->
  <section class="event_section layout_padding mb-5">
    <div class="container">
      <div class="heading_container">
        <h3>
          Events
        </h3>
        <p>
          Cavite State University - Imus Campus upcoming events.
        </p>
      </div>
      <div class="event_container">
        <div class="box">
          <div class="img-box">
            <img src="assets/images/cvsu-bg.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Education Events 2021
            </h4>
            <h6>
              8:00 AM - 5:00 PM CvSu - Imus Covered Court
            </h6>
          </div>
          <div class="date-box">
            <h3>
              <span>
                15
              </span>
              March
            </h3>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="assets/images/cvsu-bg.jpg" alt="" />
          </div>
          <div class="detail-box">
            <h4>
              Education Events 2021
            </h4>
            <h6>
              8:00 AM - 5:00 PM CvSu - Imus Old Building
            </h6>
          </div>
          <div class="date-box">
            <h3>
              <span>
                15
              </span>
              February
            </h3>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end event section -->



  <?php 
    //news 
    $sql = "SELECT * FROM news";
    $query = $conn->query($sql);
    $count = $query->num_rows;

    if ($count > 0) {
  ?>


  <!-- client section -->

  <section class="client_section layout_padding-bottom mb-5">
    <div class="container">
      <div class="heading_container">
        <h3>
          News And Updates
        </h3>
        <p>
          Check out the latest news and announcements here.
        </p>
      </div>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          <?php 
            $first = true;
            while ($row = $query->fetch_assoc()) {

              if ($first) {
                $active = 'active';
                $first = false;
              }else{
                $active = '';
              }
          
          ?>

          <div class="carousel-item <?php echo $active;  ?>">
            <div class="box">
              <div class="img-box">
                <img src="/HUREMAS/Portal/admin/uploads/news/<?php echo $row['display_image']; ?>" alt="<?php echo $row['news_headline']; ?>" width="100" height="100"  />
              </div>
              <div class="detail-box">
                <h5>
                  <?php echo $row['news_headline']; ?>
                </h5>
                <label><?php echo (new Datetime($row['news_date']))->format('F d, Y'); ?></label>
                <p>
                  <?php echo $row['news_details']; ?>
                </p>
              </div>
            </div>
          </div>

        <?php } ?>

        </div>
        <div class="btn-box">
          <a class="carousel-control-prev"  href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only" >Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <?php } ?>

  <!--Contact-->
  <?php include_once 'includes/contact.php'; ?>

  <!--footer-->
  <?php include_once 'includes/footer.php'; ?>

 
</body>

</html>