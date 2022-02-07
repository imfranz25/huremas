
<!-- header section strats -->
<header class="header_section">
  <div class="container-fluid container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="<?php echo $global_link; ?>/Home/index.php">
        <img src="<?php echo $global_link; ?>/Home/assets/images/cvsu-logo.png" alt="Cavite State University" style="width: 100%;height: auto;max-width: 130px;" class="cvsu-logo" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" ></span>
      </button>

      <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item mx-2" data-link="<?php echo $global_link; ?>/Home/index.php?#home">
            <a class="nav-link" aria-current="page" href="<?php echo $global_link; ?>/Home/index.php?#home">
              <i class="fas fa-home fa-2xs"></i> Home</a>
          </li>
          <li class="nav-item mx-2" data-link="<?php echo $global_link; ?>/Home/index.php?#about">
            <a class="nav-link" aria-current="page" href="<?php echo $global_link; ?>/Home/index.php?#about">About</a>
          </li>
          <li class="nav-item mx-2" data-link="<?php echo $global_link; ?>/Home/job/jobs.php">
            <a class="nav-link" aria-current="page" href="<?php echo $global_link; ?>/Home/job/jobs.php">Job Offerings</a>
          </li>

          <!-- DONT SHOW NEWS AND UPDATE TAB IF THERE IS NO NEWS -->

          <?php  
            $today = Date('Y-m-d');
            $sql = "SELECT id FROM news WHERE news_date >= $today ";
            $query = $conn->query($sql);
            if ($query->num_rows > 0):
          ?>

          <li class="nav-item mx-2" data-link="<?php echo $global_link; ?>/Home/index.php?#news">
            <a class="nav-link" aria-current="page" href="<?php echo $global_link; ?>/Home/index.php?#news">News & Updates</a>
          </li>

          <!-- DONT SHOW EVENTS TAB IF THERE IS NO NEWS -->

          <?php 
            endif;
            $sql2 = "SELECT id FROM events WHERE event_date >= $today ";
            $query2 = $conn->query($sql2);
            if ($query2->num_rows > 0):
          ?>

          <li class="nav-item mx-2" data-link="<?php echo $global_link; ?>/Home/index.php?#events">
            <a class="nav-link" aria-current="page" href="<?php echo $global_link; ?>/Home/index.php?#events">Events</a>
          </li>

          <?php endif; ?>

          <li class="nav-item mx-2" data-link="<?php echo $global_link; ?>/Home/index.php?#contact">
            <a class="nav-link" aria-current="page" href="<?php echo $global_link; ?>/Home/index.php?#contact">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<!-- end header section -->


<script>
  $(document).ready(function(){

    var active_link = sessionStorage.getItem("link");
    $(".nav-item").removeClass('active');
    if (active_link) { 
      $(".navbar-nav").find('[data-link="'+active_link+'"]').addClass('active');
    }else{
      $(".navbar-nav").find('[data-link="<?php echo $global_link; ?>/Home/index.php"]').addClass('active');
    }  

    $(document).on("click",".nav-item",function(){
      let link = $(this).data('link');
      sessionStorage.setItem("link",link);
    });

  });
</script>