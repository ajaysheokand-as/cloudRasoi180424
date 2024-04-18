<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php
session_start();
require_once "../config.php";
require_once "class/User.php";
require_once "class/Admin.php";
require_once "islogin.php";
$user = unserialize($_SESSION['user']);
$isSuperadmin = false;
$admin = new Admin($con, $admin_id);
$admintype = $admin->getAdminType($user->userid);
$permissions = $admin->getPermissions();
if ($admintype == 2)
  $isSuperadmin = true;


// print_r($permissions);
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $SITE_NAME ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include("navbar.php");
    include("logininfo.php");
    ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 1145.31px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"> Settings </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Feature</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                  <div class="row ">
                    <div class="col-12 col-sm-6">
                      <div class="info-box bg-light">
                        <div class="info-box-content">

                          <h3 class="info-box-text text-center text-muted">TOTAL INCOME</h3>
                          <h4 class="info-box-number text-center text-muted mb-0" id="totalsell">00</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <div class="info-box bg-light">
                        <div class="info-box-content">
                          <h3 class="info-box-text text-center text-muted">TOTAL SPENT</h3>
                          <h4 class="info-box-number text-center text-muted mb-0" id="totalexpense">00</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                   <a href="structure.php" class="btn btn-app bg-primary">

                              <i class="fas fa-plus-circle"></i> Structure
                            </a>
                 
                  <a href="addOffer.php" class="btn btn-app bg-warning">
                    <i class="fas fa-plus-circle"></i> Add Offer
                  </a>

                  <a href="addcategory.php" class="btn btn-app bg-danger">
                    <i class="fas fa-plus-circle"></i> Add Category
                  </a>

                  <a href="addproduct.php" class="btn btn-app bg-secondary">
                    <i class="fas fa-plus-circle"></i> Add Product
                  </a>

                  <a href="allproduct.php" class="btn btn-app bg-secondary">
                    <i class="fab fa-product-hunt"></i> All Product
                  </a>

                  <a href="invoice.php" class="btn btn-app bg-primary">
                    <!-- <span class="badge bg-purple">891</span> -->
                    <i class="fas fa-file-invoice"></i> Invoice
                  </a>
                  <a href="add_customer.php" class="btn btn-app bg-success">
                    <!-- <span class="badge bg-purple">891</span> -->
                    <i class="fas fa-plus-circle"></i> Add Customer
                  </a>
                  <a href="all_customer.php" class="btn btn-app bg-secondary">
                    <!-- <span class="badge bg-purple">891</span> -->
                    <i class="fas fa-users"></i> All Customer
                  </a>
                  <!--<a href="invoiceday.php" class="btn btn-app bg-success">-->

                  <!--  <i class="fas fa-calendar-day"></i> Day Book-->
                  <!--</a>-->
                  <a href="expense.php" class="btn btn-app bg-success">

                    <i class="fas fa-dollar-sign"></i> Expense
                  </a>
                   <a href="addSZAmount.php" class="btn btn-app bg-success">
                    <i class="fas fa-plus-circle"></i> Add Swiggy/Zomato Amt
                  </a>
                  <!--<a href="day_expense.php" class="btn btn-app bg-success">-->

                  <!--  <i class="fas fa-suitcase"></i> Today Expense-->
                  <!--</a>-->
                  <!--<a href="qrcode.php" class="btn btn-app bg-success">-->

                  <!--  <i class="fas fa-suitcase"></i> QR Code-->
                  <!--</a>-->
                  <!--<a href="genbill2.php?" class="btn btn-app bg-success">-->

                  <!--  <i class="fas fa-suitcase"></i> Scan Order-->
                  <!--</a>-->

                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
                <?php if (in_array('super_admin', $permissions)) {  ?>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Product & Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->


                  <div id="accordion">
                    <div class="card card-success">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseseven" aria-expanded="false">
                            Accounts <i class="fas fa-caret-down float-right"></i>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseseven" class="collapse" data-parent="#accordion">
                        <div class="card-body">

                          <a href="invoiceday.php" class="btn btn-app bg-success">

                            <i class="fas fa-calendar-day"></i> Day Book
                          </a>

                          <a href="expense.php" class="btn btn-app bg-success">

                            <i class="fas fa-file"></i> Expense
                          </a>


                        </div>
                      </div>
                    </div>
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false">
                            Reports <i class="fas fa-caret-down float-right"></i>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <a href="invoice.php" class="btn btn-app bg-success">
                            <!-- <span class="badge bg-purple">891</span> -->
                            <i class="fas fa-file-invoice"></i> Invoice
                          </a>

                          <!-- <a href="#" class="btn btn-app bg-success"> -->
                          <!-- <span class="badge bg-purple">891</span> -->
                          <!-- <i class="fas fa-file-invoice"></i> GST Report
                          </a> -->
                          <a href="stock.php" class="btn btn-app bg-success">
                            <!-- <span class="badge bg-purple">891</span> -->
                            <i class="fas fa-cubes"></i> Stock Management
                          </a>
                          <a href="analytics.php" class="btn btn-app bg-success">
                            <span class="badge bg-purple">Beta</span>
                            <i class="fas fa-chart-pie"></i> Analytics
                          </a>


                        </div>
                      </div>
                    </div>
                    <!-- TODO: COMPLETE SECTION HAVE TO SHOW THESE THREE TYPE OF HISTORY  -->
                    <!-- <div class="card card-primary">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseHistory" aria-expanded="false">
                            HISTORY <i class="fas fa-caret-down float-right"></i>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseHistory" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <a href="invoice.php" class="btn btn-app bg-success">
                            <span class="badge bg-purple">Beta</span>
                            <i class="fas fa-file-invoice"></i> Table & Room
                          </a>
                          <a href="analytics.php" class="btn btn-app bg-success">
                            <span class="badge bg-purple">Beta</span>
                            <i class="fas fa-chart-pie"></i> Transaction
                          </a>


                        </div>
                      </div>
                    </div> -->


                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
                <?php } ?>

            <!-- /.col -->

            <div class="col-md-6">
              <?php if (in_array('super_admin', $permissions)) {  ?>

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Admin</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div id="accordion">



                      <div class="card card-success">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                              Restaurant Admin Panel <i class="fas fa-caret-down float-right"></i>
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion">

                          <div class="card-body">
                            <a href="structure.php" class="btn btn-app bg-primary">

                              <i class="fas fa-plus-circle"></i> Structure
                            </a>
                            <a href="addcategory.php" class="btn btn-app bg-danger">
                              <!-- <span class="badge bg-success">300</span> -->
                              <i class="fas fa-plus-circle"></i> Add Category
                            </a>

                            <a href="addproduct.php" class="btn btn-app bg-secondary">

                              <i class="fas fa-plus-circle"></i> Add Product
                            </a>
                            <a href="allproduct.php" class="btn btn-app bg-secondary">

                              <i class="fab fa-product-hunt"></i> All Product
                            </a>
                            <a href="./user/createuser.php" class="btn btn-app bg-success">
                              <!-- <span class="badge bg-purple">891</span> -->
                              <i class="fas fa-plus-circle"></i> Add Users
                            </a>
                            <a href="alluser.php" class="btn btn-app bg-success">
                              <!-- <span class="badge bg-purple">891</span> -->
                              <i class="fas fa-users"></i> View Users
                            </a>
                            <a class="btn btn-app bg-success" href="permissions.php">
                              <span class="badge bg-purple">Beta</span>
                              <i class="fas fa-users"></i> Permission
                            </a>
                            <a class="btn btn-app bg-success" href="createNotifaction.php">
                              <span class="badge bg-purple">Beta</span>
                              <i class="fas fa-bell"></i> Notification
                            </a>
                          </div>

                        </div>
                      </div>

                    </div>
                    <a href="addrestaurant.php" class="btn btn-app bg-warning">
                      <i class="fas fa-hotel"></i> Add Restaurant
                    </a>
                    <a href="allrestaurant.php" class="btn btn-app bg-primary">
                      <i class="fas fa-hotel"></i> View Restaurant
                    </a>
                    <a href="restAnalytics.php" class="btn btn-app bg-success">
                      <i class="fas fa-chart-pie"></i> Restaurant Reports
                    </a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              <?php } ?>
            </div>
            <!-- /.col -->

          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <?php include("footer.php"); ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
    $(document).ready(function() {

      $.ajax({
        url: constant.url + "expense/totalsell.php",
        method: "POST",
        data: JSON.stringify({
          restaurant: restaurant
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          if (result.success === true)
            $('#totalsell').html(parseInt(result.data[0].sum));
        }
      });
      $.ajax({
        url: constant.url + "expense/totalexpense.php",
        method: "POST",
        data: JSON.stringify({
          restaurant: restaurant
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result);
          if (result.success === true) {
            $('#totalexpense').html(parseInt(result.data[0].sum));
          }
        }
      });
    });
  </script>

</body>

</html>