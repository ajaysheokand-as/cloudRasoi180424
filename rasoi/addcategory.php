<!DOCTYPE html>
<html lang="en">
<?php include("../config.php"); ?>
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
  <div class="wrapper">



    <!-- Preloader -->
    <?php include("./utility/preloader.php"); ?>

    <!-- Navbar -->
    <?php
    session_start();
    include("class/User.php");
    require_once("islogin.php");
    include("navbar.php");
    // $host = "sql487.main-hosting.eu";
    // $username = "u709711065_spicyrasoi";
    // $password = "NewPassword@1234";
    // $db = "u709711065_spicyrasoi";
    // $con = mysqli_connect($host, $username, $password, $db);

    if (mysqli_connect_errno()) {
      echo ("Error");
    } else {
      //echo("Successfull");
      $sql = "SELECT cat_name FROM category where admin_id = $admin_id and restaurant = $restaurant and status = 1";
      $res = $con->query($sql);
      if ($res->num_rows > 0) {
        //echo "Output fetched successfully";

      }
    }
    //die("error");
    date_default_timezone_set("Asia/Calcutta");

    ?>
    <!-- /.navbar -->
    <?php require_once('logininfo.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home </a> / Category</li>
                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Add Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <div class="card-body">
                  <div class="form-group">
                    <label for="addCategoryInput">Name of Category</label>
                    <input type="text" class="form-control" id="addCategoryInput" placeholder="Enter Category">
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary form-control" id="btnAddCategory">Create New Category</button>
                </div>

              </div>
              <!-- /.card-body -->


              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-success">
                    <div class="card-header">
                      <h3 class="card-title">Add SubCategory</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="form-group">
                        <select class="js-example-basic-single form-control" id="cat_id">
                          <?php
                          $swl = "SELECT * from category where  restaurant = $restaurant and status = 1";
                          $res = mysqli_query($con, $swl);
                          while ($row = mysqli_fetch_assoc($res)) {
                          ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="addSubCategoryInput">Name of Sub-Category</label>
                        <input type="text" class="form-control" id="addSubCategoryInput" placeholder="Enter Category">
                      </div>

                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btnAddSubCategory">Add</button>
                    </div>

                  </div>
                  <!-- /.card-body -->

                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="col-md-8">
              <!-- general form elements -->

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">All Listed Category </h3>
                  <a href=""> <i class="fas fa-sync float-right"> Refresh</i> </a>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">S.No.</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Name</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Sub Category</th>
                              <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Action</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 0;
                            $res = mysqli_query($con, $swl);
                            while ($row = $res->fetch_assoc()) {
                              $cat_id = $row['cat_id'];
                              $i++;
                            ?>
                              <tr class="odd">
                                <td class="dtr-control"><?php echo ($i); ?>
                                </td>
                                <td class="sorting_1"><a href="#"><?php echo $row['cat_name']; ?></a></td>
                                <td class="sorting_1">
                                  <?php
                                  $sub_cat_sql = "SELECT * from subcategory where  restaurant = $restaurant and status = 1 AND cat_id = $cat_id";
                                  ($sub_cat_res = mysqli_query($con, $sub_cat_sql));
                                  while ($sub_cat_row = mysqli_fetch_assoc($sub_cat_res)) {
                                  ?>
                                    <a href="#" onclick="deleteSubCatogry(<?php echo $sub_cat_row['id']; ?>)"><button type="button" class="btn btn-sm btn-outline-success"><?php echo $sub_cat_row['name']; ?> <i class="fas fa-trash-alt"> </i></button></a>
                                  <?php } ?>
                                </td>
                                <td>
                                  <a href="#"> <i class="fas fa-trash-alt" data-catid="<?php echo $row['cat_id']; ?>" onclick="deleteCategory(this);"> Remove</i></a>
                                </td>
                              </tr>
                            <?php } ?>

                          </tbody>

                        </table>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!--/.col (left) -->

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
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard.js"></script> -->
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- Page specific script -->

  <script>
    //delete category
    function deleteCategory(e) {
      ele = $(e)
      // e.preventDefault();
      const processing = "Deleting...";
      const text = e.innerHTML;

      const category = ele.attr("data-catid");
      $(document).ajaxSend(() => {
        $(e).prop("disabled", true);
        $(e).html(processing);
      });
      $.ajax({
        url: constant.url + "/category/remove.php",
        method: "POST",
        data: JSON.stringify({
          admin_id: admin_id,
          restaurant: restaurant,
          category: category,
        }),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
          // console.log(result.success);

          const json = result;
          if (json.success) swal("Good Job", " Category Removed", "success");
          else swal({
            title: "Error Occured",
            text: json.error,
            icon: "error"
          });
          console.info(json.success);
          // $("#btnAddCategory").attr("disabled");
          $(e).html(text);
        },
      });
      $(document).ajaxError((res) => {
        console.error(res);

        $(e).attr("disabled", false);
        $(e).html(text);
      });
      $(document).ajaxComplete((res) => {
        $(e).attr("disabled", false);
        $(e).html(text);
      });
    }
  </script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["pdf", "print", "colvis"]
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
  <!-- select search -->
  <script>
    $('.js-example-basic-single').select2({
      placeholder: 'Select an option'
    });
  </script>
  <script>
    function deleteSubCatogry(id) {
      swal("Are You Sure", "!!Delete Sub Category!!", "warning", {
          button: "Delete",
          dangerMode: true,

        })
        .then((res) => {
          if (res) {
            $.ajax({
              url: constant.url + "category/delete_sub_cat.php",
              method: "POST",
              data: JSON.stringify({
                restaurant: restaurant,
                id: id
              }),
              contentType: "application/json",
              dataType: "json",
              success: function(result) {
                if (result.success) {
                  swal("Success", "Deleted Successfully", "success", {
                    button: "Good",

                  }).then(() => {
                    location.reload();
                  })
                } else {
                  swal("Error", result.delete, "error", {
                    button: "OK",

                  })
                }

              }
            });
          }
        });
    }
  </script>
</body>

</html>