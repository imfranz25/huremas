<nav class="navbar header-navbar pcoded-header">
  <div class="navbar-wrapper">
    <div class="navbar-logo">
      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
        <i class="ti-menu"></i>
      </a>
      <div class="mobile-search waves-effect waves-light">
        <div class="header-search">
          <div class="main-search morphsearch-search">
            <div class="input-group">
              <span class="input-group-addon search-close">
                <i class="ti-close"></i>
              </span>
              <input type="text" class="form-control" placeholder="Enter Keyword">
              <span class="input-group-addon search-btn">
                <i class="ti-search"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <a href="index.php">
        <img class="img-fluid" src="../assets/images/huremaslogo.png" alt="Theme-Logo" />
      </a>
      <a class="mobile-options waves-effect waves-light">
        <i class="ti-more"></i>
      </a>
    </div>  
    <div class="navbar-container container-fluid">
      <ul class="nav-left">
        <li>
          <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
        </li>
        <li>
          <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
              <i class="ti-fullscreen"></i>
          </a>
        </li>
      </ul>
      <ul class="nav-right">
        <?php include_once 'notification.php'; ?>
        <li class="user-profile header-notification">
          <a href="#" class="waves-effect waves-light">
            <img src="uploads/profile/<?php echo (!empty($user['photo']))?$user['photo']:'profile.jpg'; ?>" width="40" height="40" class="img-radius" alt="User-Profile-Image">
            <span><?php echo $user['firstname']; ?></span>
            <i class="ti-angle-down"></i>
          </a>
          <ul class="show-notification profile-notification" id="profile_tab">
            <li class="waves-effect waves-light">
              <a href="profile.php" onclick="store('#setting')">
                <i class="ti-settings"></i> Settings
              </a>
            </li>
            <li class="waves-effect waves-light">
              <a href="profile.php" onclick="store('#personal')">
                <i class="ti-user"></i> Profile
              </a>
            </li>
            <li class="waves-effect waves-light">
              <a href="profile.php" onclick="store('#inbox')">
                <i class="ti-bell"></i> Notifications
              </a>
            </li>
            <li class="waves-effect waves-light">
              <a href="logout.php">
                <i class="ti-layout-sidebar-left"></i> Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  // STORE PAGE LINK TO SESSION STORAGE
  function store(id){
    sessionStorage.setItem('activeTab', id);
  }
</script>
