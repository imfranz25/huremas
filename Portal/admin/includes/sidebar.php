<!-- Redirect php js script -->
<script>
<?php 
  if (isset($_SESSION['type'])) {
    if ($_SESSION['type']!='admin') {
?>
  window.location.replace('../../index.php');
<?php }} ?>
</script>


<nav class="pcoded-navbar">
  <div class="sidebar_toggle">
    <a href="#"><i class="icon-close icons"></i></a>
  </div>
  <div class="pcoded-inner-navbar main-menu">
    <div class="main-menu-header">
      <img class="img-80 img-radius" src="<?php echo $global_link; ?>/Portal/admin/uploads/profile/<?php echo (!empty($user['photo']))?$user['photo']:'profile.jpg'; ?>" width="150" height="60" alt="User-Profile-Image">
      <div class="user-details">
        <span id="more-details"><?php echo $user['firstname']; ?><i class="fa fa-caret-down"></i></span>
      </div>
    </div>
    <div class="main-menu-content">
      <ul>
        <li class="more-details">
          <a href="profile.php" onclick="store('#personal')"><i class="ti-user"></i>View Profile</a>
          <a href="profile.php" onclick="store('#setting')"><i class="ti-settings"></i>Settings</a>
          <a href="logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
          <hr />
        </li>
      </ul>
    </div>
    <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Reports</div>
    <ul class="pcoded-item pcoded-left-item nav">
      <li class="nav-item">
        <a href="index.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
          <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="news.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="fa fa-newspaper-o"></i><b>D</b></span>
          <span class="pcoded-mtext" data-i18n="nav.dash.main">News</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="events.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="fa fa-calendar-o"></i><b>D</b></span>
          <span class="pcoded-mtext" data-i18n="nav.dash.main">Events</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>             
      <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Manage
      </div>
      <li class="pcoded-hasmenu nav-item" id="employee">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
          <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Employee</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li class="">
            <a href="employee.php?page=employee_list" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Employee List</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="overtime.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Overtime</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="official_business.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Official Business</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="cash_advance.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Cash Advance</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <!-- <li>
            <a href="deduction.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Deductions</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li> -->
          <li>
            <a href="schedule.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Schedules</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="benefits.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Benefits</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="disciplinary.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Diciplinary</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu" id="dtr">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-timer"></i></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daily Time Records</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li>
            <a href="dtr.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Attendance</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="record_correction.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Time Record Correction</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>  
        </ul>
      </li>
      <li class="pcoded-hasmenu" id="evaluation">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i></span>
          <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Tasks & Evaluation</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li>
            <a href="tasks.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Tasks</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="performance_eval.php?page=evaluation" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Evaluation</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>  
        </ul>
      </li>
      <li class="pcoded-hasmenu" id="training">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-stats-up"></i></span>
          <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Training</span>
          <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
          <li>
            <a href="training_course.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Courses</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>
          <li>
            <a href="training_vendor.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Training Vendor</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li>  
          <li>
            <a href="training_list.php" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Training List</span>
              <span class="pcoded-mcaret"></span>
            </a>
          </li> 
        </ul>
      </li>
      <li>
        <a href="position.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-layout-column3"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Designations & Departments</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      <li>
        <a href="applicant.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-target"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Applicant Tracking</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      <li id="payroll">
        <a href="payroll_list.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-money"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Payroll
          </span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
    </ul>
    <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Printables
    </div>
    <ul class="pcoded-item pcoded-left-item nav">
      <li class="nav-item">
        <a href="documents.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-zip"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Documents</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
      <li>
        <a href="archive.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-archive"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Archive</span>
          <span class="pcoded-mcaret"></span>
        </a>
      </li>
    </ul>
    <div class="pcoded-navigation-label" data-i18n="nav.category.other">Other
    </div>
    <ul class="pcoded-item pcoded-left-item nav">
      <li>
        <a href="users.php" class="waves-effect waves-dark">
          <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Users</span>
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
      var emp = (url).href.indexOf("employee") != -1 || (url).href.indexOf("overtime") != -1 || (url).href.indexOf("cash") != -1 || (url).href.indexOf("deduction") != -1 || (url).href.indexOf("schedule") != -1 || (url).href.indexOf("benefits") != -1 || (url).href.indexOf("disciplinary") != -1 || (url).href.indexOf("official_business") != -1; 
      //training
      var tra = (url).href.indexOf("training_course") != -1 || (url).href.indexOf("training_vendor") != -1 || (url).href.indexOf("training_list") != -1;
      //performance
      var per = (url).href.indexOf("tasks") != -1 || (url).href.indexOf("performance_eval") != -1;
      var dtr = (url).href.indexOf("dtr") != -1 || (url).href.indexOf("record_correction") != -1;
      if (emp){
        $("#employee").addClass('active'); // ACTIVATE ACTIVE
      }else if (tra){
        $("#training").addClass('active'); // ACTIVATE ACTIVE
      }else if (per){
        $("#evaluation").addClass('active'); // ACTIVATE ACTIVE
      }else if (dtr){
        $("#dtr").addClass('active'); // ACTIVATE ACTIVE
      }
    }
    if ((url).href.indexOf("overtime_category") != -1 || (url).href.indexOf("new_employee_cnt") != -1 || (url).href.indexOf("new_employee_jo") != -1) {
      $("#employee").addClass('active'); // ACTIVATE ACTIVE
    }else if ((url).href.indexOf("new_evaluation") != -1 || (url).href.indexOf("edit_evaluation") != -1) {
      $("#evaluation").addClass('active'); // ACTIVATE ACTIVE
    }else if ((url).href.indexOf("payroll_summary") != -1 ) {
      $("#payroll").addClass('active'); // ACTIVATE ACTIVE
    }
  });

</script>
