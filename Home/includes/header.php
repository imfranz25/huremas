
<!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="/HUREMAS/Home/index.php">
            <img src="/HUREMAS/Home/assets/images/cvsu-logo.png" alt="Cavite State University" style="width: 100%;height: auto;max-width: 130px;" class="cvsu-logo" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
          </button>

          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-2" data-link="/HUREMAS/Home/index.php?#home">
                <a class="nav-link" aria-current="page" href="/HUREMAS/Home/index.php?#home">
                  <i class="fas fa-home fa-2xs"></i> Home</a>
              </li>
              <li class="nav-item mx-2" data-link="/HUREMAS/Home/index.php?#about">
                <a class="nav-link" aria-current="page" href="/HUREMAS/Home/index.php?#about">About</a>
              </li>
              <li class="nav-item mx-2" data-link="/HUREMAS/Home/job/jobs.php">
                <a class="nav-link" aria-current="page" href="/HUREMAS/Home/job/jobs.php">Job Offerings</a>
              </li>
              <li class="nav-item mx-2" data-link="/HUREMAS/Home/index.php?#news">
                <a class="nav-link" aria-current="page" href="/HUREMAS/Home/index.php?#news">News & Updates</a>
              </li>
              <li class="nav-item mx-2" data-link="/HUREMAS/Home/index.php?#events">
                <a class="nav-link" aria-current="page" href="/HUREMAS/Home/index.php?#events">Events</a>
              </li>
              <li class="nav-item mx-2" data-link="/HUREMAS/Home/index.php?#contact">
                <a class="nav-link" aria-current="page" href="/HUREMAS/Home/index.php?#contact">Contact</a>
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
          $(".navbar-nav").find('[data-link="/HUREMAS/Home/index.php"]').addClass('active');
        }  

        $(document).on("click",".nav-item",function(){
          let link = $(this).data('link');
          sessionStorage.setItem("link",link);
        });


      });
    </script>