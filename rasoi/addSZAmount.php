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
                            <h1 class="m-0">Swiggy/Zomato Managment </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home </a> / Offer</li>
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
                                    <h3 class="card-title">Add Amount</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="amount_type">Select</label>
                                        <select id="platform" class="form-control  ">
                                            <option selected value="Swiggy">Swiggy</option>
                                            <option value="Zomato">Zomato</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount </label>
                                        <input type="number" class="form-control" id="amount" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" placeholder=""></textarea>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary form-control" id="submit" onclick="addBillAmount();">Add Amount</button>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->



                        </div>
                        <!-- /.card -->

                        <div class="col-md-8">
                            <!-- general form elements -->

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">History </h3>
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
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Added In</th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Amount </th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Description</th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Date</th>
                                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending" aria-sort="ascending">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $sql = "SELECT * FROM orders where restaurant = $restaurant and status = 1 and name in ('Zomato','Swiggy')";
                                                        $res = mysqli_query($con, $sql);
                                                        // print_r($res);
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                            $i++;
                                                        ?>

                                                            <tr class="odd">
                                                                <td class="dtr-control"><?php echo ($i); ?>
                                                                </td>
                                                                <td class="sorting_1"><?php echo $row['name']; ?></td>
                                                                <td class="sorting_1"><?php echo $row['order_value']; ?></td>
                                                                <td class="sorting_1"><?php echo $row['remarks']; ?></td>
                                                                <td class="sorting_1"><?php echo date('d-m-Y', strtotime($row['date'])); ?></td>
                                                                <td class="sorting_1"><a href="#" onclick="deleteZSinvoice(<?php echo $row['id'] ?>)" class="btn btn-danger btn-sm">Delete</a></td>

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
        //add new offer
        function addBillAmount() {
            const platform = $('#platform').val();
            const amount = $('#amount').val();
            const description = $('#description').val();
            $.ajax({
                url: constant.url + "order/orders.php",
                method: "POST",
                data: JSON.stringify({
                    admin_id,
                    restaurant,
                    remarks: description,
                    totalPrice: amount,
                    customerName: platform,
                    customerType: platform,
                    recived: amount,
                    paid: amount,
                    platform_type: platform
                }),
                contentType: "application/json",
                dataType: "json",
                success: function(json) {
                    // console.log(result.success);


                    if (json.success) swal("Bills Amount Added", "You  Successfully added bill", "success").then((value) => {
                        location.reload()
                    });
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
        function deleteZSinvoice(id) {
            console.log(id, restaurant)
            swal("Are You Sure", "!!Delete Invoice!!", "warning", {
                    button: "Delete",
                    dangerMode: true,

                })
                .then((res) => {
                    if (res) {
                        $.ajax({
                            url: constant.url + "order/delete_zs_amount.php",
                            method: "POST",
                            data: JSON.stringify({
                                restaurant: restaurant,
                                invoice: id

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