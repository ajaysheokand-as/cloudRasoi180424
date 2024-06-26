<html lang="en">
<?php include("../../config.php");
// print_r("con".$con);
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $SITE_NAME ?> | Registration Page </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="register-page" style="min-height: 542px;">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Cloud</b>Rasoi</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>



        <form action="" method="post">
          <div class="input-group mb-3">

            <!-- <label>Gender</label> -->

            <select id="restaurant" class="form-control">
              <option value="0">Select Restaurant / Hotel</option>
              <?php
              $sql = "SELECT name,restaurantid as id from restaurant";
              $res = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($res)) {
              ?>
                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="input-group mb-3">
            <input type="text" id="username" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" id="mobile" class="form-control" placeholder="Mobile No.">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" id="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">

            <input type="password" id="cpassword" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p id="cPasswordLabel"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button id="btnRegister" type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <!-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a> -->
          <a href="https://www.cloudrasoi.com" class="btn btn-block btn-danger">
            <!-- <i class="fab fa-google-plus mr-2"></i> -->
            I already have a membership
          </a>
        </div>

        <!-- <a href="login.php" class="text-center">I already have a membership</a> -->
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../scripts/request.js"></script>
  <script>
    $(document).ready(function() {
      $("#btnRegister").prop("disabled", true);
      $("#cpassword").keyup((e) => {
        if ($("#cpassword").val() != $("#password").val()) {
          const style = {
            'background-color': 'red'
          }
          $("#cPasswordLabel").html("Confirm password not match");
          $("#cPasswordLabel").css(style);
          // = true;
          // alert("Confirm Password")
        } else {
          $("#cPasswordLabel").hide();
          $("#btnRegister").prop("disabled", false);
        }

      });
    });
  </script>
</body>

</html>