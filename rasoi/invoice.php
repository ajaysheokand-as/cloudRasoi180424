<!DOCTYPE html>
<html lang="en">
<?php session_start();
require_once("class/User.php");
require_once("islogin.php");
// require_once("config.php");
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
        <?php
        include_once("navbar.php");
        require_once("logininfo.php");
        date_default_timezone_set("Asia/Calcutta");

        ?>
        <!-- /.navbar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Invoice Report </h1>
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
                                    <h3 class="card-title">Invoice </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date</th>
                                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="ascending">Invoice No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column descending">Name Of Customer</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Total Amount</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Mode</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">From</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT a.id as invoice,a.orderid,a.name,a.bill_no,a.paid,a.order_type,a.tableid,a.date,b.title FROM orders a, dashboard b where a.restaurant = b.restaurant and b.id = a.tablegroup and a.restaurant = $restaurant and a.status = 1 order by a.id desc";
                                                        $res = $con->query($sql);
                                                        while ($row = $res->fetch_assoc()) {
                                                            $orderid =  $row['orderid'];
                                                            $invoice =  $row['invoice'];
                                                            $type = $row['order_type'];
                                                            if ($type == 'store_price')
                                                                $mode = "Store";
                                                            else if ($type == 'zomato_price')
                                                                $mode = "Zomato";
                                                            else if ($type == 'swiggy_price')
                                                                $mode = "Swiggy";
                                                            else if ($type == 'gst_price')
                                                                $mode = "GST Store";
                                                        ?>

                                                            <tr class="odd">
                                                                <td class="dtr-control"><?php echo date('d-m-Y', strtotime($row['date'])); ?> </td>
                                                                <td class="sorting_1"><?php echo  $row['bill_no']; ?> </td>
                                                                <td class="dtr-control"><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['paid']; ?> </td>
                                                                <td class="dtr-control"><?php echo $mode; // TODO: change this paymode
                                                                                        ?>
                                                                </td>

                                                                <td>

                                                                    <?php echo $row['title']; ?> <span><?php echo $row['tableid']; ?></span>


                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button type="button" target="_blank" href="posprint.php?orderid=<?php echo $orderid; ?>" class="btn btn-info">Action</button>
                                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                        </button>
                                                                        <?php

                                                                        $sql1 = "SELECT b.user_mobile as mobile FROM `orders` a, customer b WHERE a.user_id = b.user_id and a.orderid ='$orderid' limit 1";
                                                                        $res1 = $con->query($sql1);
                                                                        $isRegistered = false;
                                                                        // print_r($res1);
                                                                        if ($res1->num_rows > 0) {
                                                                            $row1 = $res1->fetch_assoc();
                                                                            $customer_mobile = $row1['mobile'];
                                                                            $isRegistered = true;
                                                                        }

                                                                        ?>
                                                                        <div class="dropdown-menu" role="menu">
                                                                            <a class="dropdown-item" target="_blank" href="posprint.php?orderid=<?php echo $orderid; ?>"> <i class="fas fa-eye mr-2" style="color:blue"> View </i></a>
                                                                            <?php if ($isRegistered) { ?><a class="dropdown-item" href="https://api.whatsapp.com/send/?phone=<?php echo $customer_mobile; ?>&text=https://spicyrasoi.com/spicyrasoi/posprint.php?orderid=<?php echo $orderid; ?>&app_absent=0"><i class="fas fa-share mr-2" style="color:green"> Share </i></a><?php } ?>
                                                                            <a class="dropdown-item" href="#" onclick="deleteInvoice(<?php echo $invoice; ?>)"><i class="fas fa-trash mr-2" style="color:red"> Delete </i></a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>

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
                "ordering": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,

                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    <script>
        function deleteInvoice(invoice) {
            swal("Are You Sure", "!!Delete Invoice!!", "warning", {
                    button: "Delete",
                    dangerMode: true,

                })
                .then((res) => {
                    if (res) {
                        $.ajax({
                            url: constant.url + "order/delete_invoice.php",
                            method: "POST",
                            data: JSON.stringify({
                                restaurant: restaurant,
                                invoice: invoice

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

    <?php require_once("isloginfooter.php"); ?>
</body>

</html>