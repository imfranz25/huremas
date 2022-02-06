
<div class="hero_area" id="home">
  <div class="top mx-5 pt-2">
    <h1 class="header-left" >
      <div class="header-l" >
        <a href="mailto:hrdoimus@cvsu.edu.ph">
          <i  class="bi bi-telephone-fill mx-2"></i>Contact Us
        </a>
        <div class="header-right">
          <a href="<?php echo $global_link; ?>/Portal/index.php">
            <?php if (isset($_SESSION['id'])){ ?>
              <i class="fa fa-chevron-left mx-2"></i> Go to Portal
            <?php }else{ ?>
              <i class="bi bi-person-badge-fill mx-2"></i> Log in
            <?php } ?>
          </a>  
        </div>
      </div>
    </h1>
  </div>
