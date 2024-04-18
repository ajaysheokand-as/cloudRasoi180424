<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once 'class/User.php';
require_once '../config.php';
require_once("islogin.php");
$user = unserialize($_SESSION['user']);

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $SITE_NAME ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">

    <!-- Preloader -->
    <?php include("./utility/preloader.php"); ?>

    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- /.navbar -->

    <?php require_once("logininfo.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      $sql = "SELECT b.name,b.mobile,b.phone,b.email,b.gst,b.country,b.state,b.state,b.district,b.city,b.add_on FROM users a, restaurant b where a.restaurant = b.restaurantid and a.user_id = $user->userid";
      $res = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($res);
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-4">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <!-- <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">
                  </div> -->

                  <h1 class="profile-username text-center"><?php echo $row['name']; ?></h1>

                  <p class="text-muted text-center"><?php echo $row['city']; ?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>GST No.</b> <a class="float-right"><?php echo $row['gst']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Mob. No.</b> <a class="float-right"><?php echo $row['mobile']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone No.</b> <a class="float-right"><?php echo $row['phone']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right"><?php echo $row['email']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Country</b> <a class="float-right"><?php echo $row['country']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>State</b> <a class="float-right"><?php echo $row['state']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Distt.</b> <a class="float-right"><?php echo $row['district']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>City/Village</b> <a class="float-right"><?php echo $row['city']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Reg. Date</b> <a class="float-right"><?php echo $row['add_on']; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Valid Upto</b> <a class="float-right">17/10/2022</a>
                    </li>
                  </ul>

                  <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


            </div>
            <!-- /.col -->
            <div class="col-md-8">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <!-- <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li> -->
                    <li>
                      <h2>Edit</h2>
                    </li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane" id="activity">



                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                      <!-- The timeline -->
                      <div class="timeline timeline-inverse">


                      </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane active" id="settings">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="username" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="mobile" class="col-sm-2 col-form-label">Mob. No.</label>
                          <div class="col-sm-10">
                            <input type="number" value="<?php echo $row['mobile']; ?>" class="form-control" id="mobile" placeholder="Mobile">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
                          <div class="col-sm-10">
                            <input type="number" value="<?php echo $row['phone']; ?>" class="form-control" id="phone" placeholder="Phone">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="gst_no" class="col-sm-2 col-form-label">GST No.</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $row['gst']; ?>" id="gst_no" placeholder="GST No.">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" value="<?php echo $row['email']; ?>" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="country" class="col-sm-2 col-form-label">Country</label>
                          <div class="col-sm-10">
                            <input type="text" value="<?php echo $row['country']; ?>" class="form-control" id="country" placeholder="Country">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="state" class="col-sm-2 col-form-label">State</label>
                          <div class="col-sm-10">
                            <input type="text" value="<?php echo $row['state']; ?>" class="form-control" id="state" placeholder="State">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="district" class="col-sm-2 col-form-label">District</label>
                          <div class="col-sm-10">
                            <input type="text" value="<?php echo $row['district']; ?>" class="form-control" id="district" placeholder="District">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="city" class="col-sm-2 col-form-label">City / Village </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="city" value="<?php echo $row['city']; ?>" placeholder="City / Village">
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" id="btnUpdateProfile" class="btn btn-danger">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>


  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="scripts/request.js"></script>
  <?php require_once("isloginfooter.php"); ?>
</body>

</html>