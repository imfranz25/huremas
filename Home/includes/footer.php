 <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container" >
      <div>
      <a href="<?php echo $global_link; ?>/Home/">
        <img src="<?php echo $global_link; ?>/Home/assets/images/cvsu-logo.png" alt="Cavite State University" style="width: 100%;height: auto;max-width: 180px;" class="cvsu-logo" />
      </a>
      <a target="_blank" href="https://www.youtube.com/channel/UCMraY_VdxLvKTktj1el5FwQ" class="social mx-2"><i class="fab fa-youtube fa-2x"></i></a>
      <a target="_blank" href="https://www.facebook.com/cvsuimusofficialpage" class="social mx-2"><i class="fab fa-facebook fa-2x"></i></a>
      </div>
    </div>
    <div >
      <hr />
    </div>
    <div class="container" >
      <div class="row mar-3">
        <div class="col-md-3">
          <a href="https://www.gov.ph"><img src="<?php echo $global_link; ?>/Home/assets/images/rng.png" alt="Philippine Government Logo"></a>
        </div>
        <div class="col-md-2 mb-2">
          <div class="info_menu">
            <h5>
              <label class="py-2" style="border-bottom:1px solid gray;">Gov Links</label>
            </h5>
            <ul class="navbar-nav  ">
              <li>
                <a class="nav-link" href="https://www.gov.ph"> Gov PH <span class="sr-only">(current)</span></a>
              </li>
              <li>
                <a class="nav-link" href="https://ched.gov.ph"> CHED PH </a>
              </li>
              <li>
                <a class="nav-link" href="http://cavite.gov.ph/home/"> Cavite PH </a>
              </li>
              <li>
                <a class="nav-link" href="https://imus.gov.ph"> Imus PH </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 mb-2">
          <div class="info_menu">
            <h5>
              <label class="py-2" style="border-bottom:1px solid gray;">Quick Links</label>
            </h5>
            <ul class="navbar-nav  ">
              <li>
                <a class="nav-link" href="<?php echo $global_link; ?>/Home/job/jobs.php"> Job Offering <span class="sr-only">(current)</span></a>
              </li>

              <?php  
                $today = Date('Y-m-d');
                $sql = "SELECT id FROM news WHERE news_date >= $today ";
                $query = $conn->query($sql);
                if ($query->num_rows > 0):
              ?>

              <li>
                <a class="nav-link" href="<?php echo $global_link; ?>/Home/index.php?#news"> News and Updates </a>
              </li>

              <?php 
                endif; 
                $sql2 = "SELECT id FROM events WHERE event_date >= $today ";
                $query2 = $conn->query($sql2);
                if ($query2->num_rows > 0):
              ?>

              <li>
                <a class="nav-link" href="<?php echo $global_link; ?>/Home/index.php?#events"> Events </a>
              </li>

              <?php endif; ?>

              <li>
                <a class="nav-link" href="<?php echo $global_link; ?>/Home/index.php?#about"> About Us </a>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-3 mb-2">
          <div class="info_menu">
            <h5>
              <label class="py-2" style="border-bottom:1px solid gray;">Contact Us</label>
            </h5>
            <ul class="navbar-nav  ">
              <li >
                <a>
                  <i class="fas fa-map-marker-alt fa-2xs mx-2"></i> Cavite Civic Center, Palico IV, Imus City, Cavite 4103<br /><br />
              </li>
              <li class="nav-item">
                <a>
                <i class="fas fa-mobile-alt fa-2xs mx-2"></i>
                (046) 471-6607<br /><br />
              </li>
              <li class="nav-item">
                <a href="mailto:hrdoimus@cvsu.edu.ph"> <i class="fas fa-globe-americas fa-2xs mx-2"></i> hrdoimus@cvsu.edu.ph</a></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <?php echo date('Y'); ?> 
      HUREMAS - CVSU Imus Campus All Rights Reserved.
    </p>
  </footer>

  <!-- footer section -->
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
