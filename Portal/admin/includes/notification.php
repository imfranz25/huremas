
<style>
  .notification-msg:first-letter {
    text-transform: uppercase;
  }
</style>

<?php 

  $sql = "SELECT *,notification.date AS ndate FROM notification LEFT JOIN employees ON employees.employee_id=notification.employee_id WHERE type ='admin' ORDER BY notification.date LIMIT 5 ";
  $query = $conn->query($sql);
  $count = mysqli_num_rows($query);

?>


<li class="header-notification">
  <a href="#!" class="waves-effect waves-light">
    <i class="ti-bell"></i>
    <?php if ($count!=0): ?>
      <span class="badge bg-c-red"></span>
    <?php endif; ?>
  </a>
  <ul class="show-notification">
    <li style="border-bottom : 1px solid rgba(0, 0, 0, .3);">
      <h6>Notifications</h6>
        <!-- <label class="label label-danger">New</label> -->
    </li>
    
      <?php 
        while ($row=$query->fetch_assoc()):
        $full = $row['firstname'].' '.$row['lastname'];
        $dates = (new Datetime($row['ndate']))->format('F m, Y');
        $title = str_replace($full, '', $row['title']);

      ?>
        <li class="waves-effect waves-light link" 
        data-link="<?php echo $row['link']; ?>" 
        onclick="location.replace($(this).data('link'));"
        style="border-bottom: 1px solid rgba(0, 0, 0, .3);">
          <div class="media">
            <img class="d-flex align-self-center img-radius" src="/HUREMAS/Portal/admin/images/<?php echo $row['photo']; ?>" alt="<?php echo $full; ?>">
              <div class="media-body">
                <h5 class="notification-user"><?php echo $full; ?></h5>
                  <p class="notification-msg"><?php echo ucfirst($title); ?></p>
                  <span class="notification-time"><?php echo $dates; ?></span>
              </div>
          </div>
        </li>

      <?php 
        endwhile;
        if ($count>0){
      ?>
        <li class="waves-effect waves-light my-0 py-0 bg-light rounded-bottom">
          <div class="row my-0 py-0">
            <h6 class="col-12 text-right my-0 py-1">
              <a href="profile.php" style="text-decoration:underline;" 
              onclick="store('#inbox')"
              >See all</a>
            </h6>
          </div>
        </li>

      <?php }else{ ?>

        <li class="waves-effect waves-light">
          <div class="media">
            <img class="d-flex align-self-center img-radius" src="../assets/images/no_notif.png" alt="No Notification">
              <div class="media-body">
                <h5 class="notification-user">No Notification</h5>
                  <p class="notification-msg">Check back later for updates.</p>
              </div>
          </div>
        </li>

      <?php } ?>

  </ul>
</li>

