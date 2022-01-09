<script>
if (isset($_SESSION['type'])) {
   if ($_SESSION['type']!='employee') {
  ?>
  wind  <?php 
  ow.location.replace('../../index.php');
<?php }} ?>
</script>
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="../assets/images/avatar-4.jpg" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">Dream<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="profile.php" onclick="store('#personal')"><i class="ti-user"></i>View Profile</a>
                                          <a href="profile.php" onclick="store('#setting')"><i class="ti-settings"></i>Settings</a>
                                          <a href="logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search</label>
                                  </div>
                              </form>
                          </div>
                          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Reports</div>
                          <ul class="pcoded-item pcoded-left-item nav">
                              <li class="nav-item">
                                  <a href="index.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span></a>
                              </li>
                          
                              <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Manage</div>
                              <li>
                                <a href="dtr.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-timer"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Attendance</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li>
                                <a href="overtime.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="fa fa-clock-o"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Overtime</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li>
                                <a href="official_business.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="fa fa-id-card-o"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Official Business</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            
                        
 
                            <li>
                                <a href="cash_advance.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="fa fa-money"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Cash Advance</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="disciplinary.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-receipt"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Diciplinary</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="benefits.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-gift"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Benefits</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                             <li>
                                <a href="tasks.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-flag-alt-2"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tasks</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="training.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-stats-up"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Trainings</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="documents.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-support"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Document Request</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
        
                          </ul>
        
                          
                      </div>
                  </nav>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
        // STORE PAGE LINK TO SESSION STORAGE
        function store(id){
           sessionStorage.setItem('activeTab', id);
        }

        $(document).ready(function (){
        
          // CHECK THE CURRENT PAGE FOR ACTIVE LINK
          var url = window.location; // get location for basis
          var element = $('ul.nav a').filter(function() {
            return this.href == url || url.href.indexOf(this.href) == 0; // check if the url is "IN" href
          }).addClass('active').parent().addClass('in');
          if (element.is('li')) {
            $('.nav li.active').removeClass('active'); // REMOVE EXISTING
            element.addClass('active'); // ACTIVATE ACTIVE
            //for nested li (e.g Employee)
            var emp = (url).href.indexOf("employee") != -1 || (url).href.indexOf("overtime") != -1 || (url).href.indexOf("cash") != -1 || (url).href.indexOf("deduction") != -1 || (url).href.indexOf("position") != -1 || (url).href.indexOf("schedule") != -1 || (url).href.indexOf("benefits") != -1 || (url).href.indexOf("disciplinary") != -1;
            if (emp){
              $("#employee").addClass('active'); // ACTIVATE ACTIVE
            }else if ((url).href.indexOf("evaluation") != -1){
              $("#evaluation").addClass('active'); // ACTIVATE ACTIVE
            }
          }



        });

      </script>
