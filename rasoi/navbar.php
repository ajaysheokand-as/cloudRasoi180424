<?php
$sql = "SELECT a.permission_id,a.admin,b.permission FROM admin_permission a, permissions b where a.permission_id = b.id and a.admin=$admin_id and a.status = 1";
$res = mysqli_query($con, $sql);
// print_r($res); 
$permissions = array();
if (mysqli_num_rows($res) > 0)

  while ($permission = mysqli_fetch_assoc($res))
    array_push($permissions, $permission['permission']);

// print_r($permissions);
?>
<!-- Sweetalert2 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand border border-secondary rounded p-1">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="<?php echo $siteName; ?> logo" class="brand-image elevation-3" style="opacity: 1"> -->
      <span class="brand-text text-success font-weight-bold ">Cloud</span><span class="brand-text text-danger font-weight-bold ">Rasoi</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link"><i class="fas fa-home"> Home </i></a>

        </li>
        <li class="nav-item">
          <a href="genbill.php?table=1&group=<?php echo ($restaurant); ?>101&name=<?php echo ($restaurant); ?>1011" class="nav-link"><i class="fas fa-plus-circle"> Create Bill</i></a>
        </li>
        <li class="nav-item">
          <a href="invoice.php" class="nav-link"><i class="fas fa-receipt"> Transastion</i></a>
        </li>
        <li class="nav-item">
          <a href="add_customer.php" class="nav-link"><i class="fas fa-users"> Customer</i></a>
        </li>

        <!-- <li class="nav-item">
          <a href="genbill.php?method=swiggy&table=1&group=<?php echo ($restaurant); ?>102&name=<?php echo ($restaurant); ?>1021" class="nav-link"><i class="fas fa-hamburger"> Swiggy</i></a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="genbill.php?method=zomato&table=1&group=<?php echo ($restaurant); ?>103&name=<?php echo ($restaurant); ?>1031" class="nav-link"><i class="fas fa-hamburger"> Zomato</i></a>
        </li> -->
        <li class="nav-item">
          <a href="process.php" class="nav-link">
            <i class="fas fa-sync"> Process </i>
            <span class="badge badge-warning navbar-badge">
              <?php
              // echo $admin_type;
              $sql = "SELECT COUNT(a.orderid) as total FROM orders a, `tables_session` b,`dashboard` c where a.orderid=b.orderid and c.id = b.table_cat and b.status =1 and a.restaurant = $restaurant";
              if ($res = mysqli_query($con, $sql))
                echo mysqli_num_rows($res) > 0 ? mysqli_fetch_assoc($res)['total'] : 0;
              ?>
            </span>
          </a>

        </li>
         <li><a href="setting.php" class="nav-link"><b><i class="fas fa-cog"> Settings</i></b></a></li>
        <!--<?php if (in_array('settings', $permissions) || in_array('super_admin', $permissions)) {  ?>-->
        <!--  <li><a href="setting.php" class="nav-link"><b><i class="fas fa-cog"> Settings</i></b></a></li>-->
        <!--<?php } ?>-->
        <!-- <li><a href="contact.php" class="nav-link"><i class="fas fa-hands-helping"> Contact Us</i></a></li> -->

        <!-- <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="index.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"> <i class="fas fa-info-circle"> More </i></a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <?php if (in_array('settings', $permissions) || in_array('super_admin', $permissions)) {  ?>
              <li><a href="setting.php" class="dropdown-item"><b><i class="fas fa-cog"> Settings</i></b></a></li>
            <?php } ?>
            <li class="dropdown-divider"></li>
            <li><a href="contact.php" class="dropdown-item"><i class="fas fa-hands-helping"> Contact Us</i></a></li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a href="#" class="nav-link border border-success rounded"><i class="fas fa-phone"> 8570996916</i></a>
        </li>
      </ul>

    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php
          $sql = "SELECT count(a.id) as total FROM `notifications` a WHERE a.id not in (SELECT b.notification_id from notification_show b where b.restaurant = $restaurant)";
          $res = mysqli_query($con, $sql);
          $total = mysqli_fetch_assoc($res)['total'];

          if ($total > 0) {
          ?>
            <span class="badge badge-warning navbar-badge" id="notification-badge"><?php echo $total; ?></span>
          <?php } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> <?php echo $total; ?> Notifications</span>

          <?php
          $sql = "SELECT title FROM `notifications` a WHERE a.id not in (SELECT b.notification_id from notification_show b where b.restaurant = $restaurant) order by id DESC LIMIT 7";
          $res = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($res)) { ?>

            <div class="dropdown-divider"></div>
            <a href="notifaction.php" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> <?php echo $row['title']; ?>
            <?php } ?>
            <!-- TODO To Show time (How old this notifaction) -->
            <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
            </a>


            <div class="dropdown-divider"></div>
            <a href="notifaction.php" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item">
        <div class="btn-group">

          <button type="button" class="btn btn-success">Profile</button>

          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu" role="menu">
            <?php if (in_array('settings', $permissions) || in_array('super_admin', $permissions)) {  ?>
              <a class="dropdown-item" href="profile.php">Edit</a>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="user/logout.php">Log Out</a>
          </div>
        </div>
      </li>


    </ul>
  </div>
</nav>