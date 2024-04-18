<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "../config.php";
require_once "class/User.php";
require_once "islogin.php";
if (isset($_GET['assign']) && isset($_GET['restaurant'])) {
  $user = unserialize($_SESSION['user']);

  $user->restaurant = $_GET['restaurant'];
  $_SESSION['user'] = serialize($user);

  // $restaurant = $user->$_GET['restaurant'];
  // $admin_id = $user->userid;

}
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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">

    <!-- Preloader -->
    <?php include("./utility/preloader.php"); ?>

    <!-- Navbar -->
    <?php include("navbar.php");


    //echo("Successfull");
    $sql = "SELECT * FROM restaurant ";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
      //echo "Output fetched successfully";

    }

    //die("error");
    date_default_timezone_set("Asia/Calcutta");

    //  $sql = "SELECT * FROM users ";
    //  $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    // 	echo "Output fetched successfully";

    //}

    ?>
    <!-- /.navbar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">All Listed Resturant</h1>
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

      <!-- Main content -->
      <section class="content">
        <div class="container">
          <div class="row">
            <div class="col-12">

              <!-- /.card -->

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Listed Resurant </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Name</th>
                              <th class="sorting" tabindex="0" id="abc" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Reg. Date</th>
                            
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Restaurant ID</th>
                             
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Mob. No.</th>
                              <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Phone. No.</th> -->
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Email</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">GST. No.</th>
                              <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Country</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">State</th>
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">District</th> -->
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">City/Village</th>


                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            while ($row = $res->fetch_assoc()) {
                              //echo "id: " . $row["user_id"]. " - Name: " . $row["user_name"]. " " . $row["user_email"]. "<br>";
                            ?>

                              <tr class="odd">
                                <td>
                                  <div class="form-check">
                                   
                                 <?php if ($row['status']==1) { ?>  <label class="form-check-label btn btn-danger btn-sm" id="rest_status_text_<?php echo $row['restaurantid']; ?>" for="r_status_<?php echo $row['restaurantid']; ?>" style="font-weight: bold; cursor:pointer; margin: 2px; "> Stop </label> 
                                  <input class="form-check-input" id="r_status_<?php echo $row['restaurantid']; ?>" type="checkbox" hidden onclick="res_status(this,<?php echo $row['restaurantid']; ?>);">
                                  <?php } else { ?>
                                  <label class="form-check-label btn btn-success btn-sm" id="rest_status_text_<?php echo $row['restaurantid']; ?>"  for="r_status_<?php echo $row['restaurantid']; ?>" style="font-weight: bold; cursor:pointer; margin: 2px;"> Start </label>
                                  <input class="form-check-input" id="r_status_<?php echo $row['restaurantid']; ?>" type="checkbox" hidden checked onclick="res_status(this,<?php echo $row['restaurantid']; ?>);">
                                   <?php } ?>
                                  <a class="btn btn-dark btn-sm"  href="?assign=1&restaurant=<?php echo $row['restaurantid']; ?>" style="margin: 2px;">  Assign </a> </div></td>
                                <td class="sorting_1"><?php echo $row['name']; ?></td>
                                <td><?php echo $row['add_on']; ?> </td>
                                <td class="dtr-control"><?php echo $row['restaurantid']; ?> </td>
                                
                                <td><?php echo $row['mobile']; ?> </td>
                                  <!-- <td><?php echo $row['phone']; ?></td> -->
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['gst']; ?></td>
                                  <!-- <td><?php echo $row['country']; ?></td> -->
                                  <!-- <td><?php echo $row['state']; ?></td> -->
                                  <!-- <td><?php echo $row['district']; ?></td> -->
                                  <td><?php echo $row['city']; ?></td>

                                 

                                  <!-- <td  >U</td>
                    <td  >U</td>
                    <td  >U</td> -->
                              </tr>

                            <?php } ?>

                          </tbody>
                          <!-- <tfoot>
                  <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1"  >Platform(s)</th><th rowspan="1" colspan="1"  >Engine version</th><th rowspan="1" colspan="1"  >CSS grade</th></tr>
                  </tfoot> -->
                        </table>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("footer.php"); ?>
  </div>
  <!-- ./wrapper -->

  <script>
    function res_status(check_box, rest_id) {
      
      const id_rest_text = "rest_status_text_" + rest_id;
      //  document.getElementById(id_rest_text).innerText="Changed";
      // check_box.innerHTML="Changed";
      //  $("#"+id_rest_text).html("Nothing");
      //  $("#abc").html("Activate");
      var check_box_status = !check_box.checked;
      //  alert(check_box_status);
      var status = check_box_status == true ? 1 : 0;
      $.ajax({
        url: constant.url + "restaurant/rest_status.php",
        method: "POST",
        data: JSON.stringify({
          rest_id: rest_id,
          status: status
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result.success);

          const json = result;
          if (json.success) {
            // $("#rest_status_text_"+rest_id).html("Activate");
            console.log("#rest_status_text_" + rest_id);
            // swal({ title: "Success", text: json.error, icon: "success" })
           restSwitch(rest_id,check_box_status);
          } else swal({
            title: "Error Occured",
            text: json.error,
            icon: "error"
          });
          console.info(json.success);
          // $("#btnAddCategory").attr("disabled");
          // $("#btnAddCategory").html("Submit");

        }
      })
    }
    function restSwitch(rest_id,check_box_status){
      console.log(check_box_status==true)
      if (check_box_status != true) {
              $("#rest_status_text_" + rest_id).html("Start");
              $("#rest_status_text_" + rest_id).attr("class", "form-check-label btn btn-success btn-sm");
              $
            }
            else {
              $("#rest_status_text_" + rest_id).html("Stop");
              $("#rest_status_text_" + rest_id).attr("class", "form-check-label btn btn-danger btn-sm");
            }
    }
  </script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
  <!-- Sparkline -->
  <!-- <script src="plugins/sparklines/sparkline.js"></script> -->
  <!-- Sweetalert2 -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- JQVMap -->
  <!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
  <!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
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
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard.js"></script> -->
</body>

</html>