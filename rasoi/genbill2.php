<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "../config.php";
require_once "class/User.php";
require_once "islogin.php";
// print_r($user);
$tableid = 0;
$groupid = 0;
$table = 0;

// print_r($user);
if (isset($_GET['table']) && isset($_GET['group']) && isset($_GET['name'])) {
    $table = $_GET['table'];
    $groupid = $_GET['group'];
    $name = $_GET['name'];
    $tableid = $groupid . $table;
    if (!isset($_SESSION['tables']))
        $_SESSION['tables'] = array();
    $arr = $_SESSION['tables'];

    $activeTables = sizeof($arr);
    if (!in_array($tableid, $arr))
        $_SESSION['tables'][$activeTables] = $tableid;
}
$method = "store_price";
if (isset($_GET['method'])) {

    if ($_GET['method'] == "swiggy")
        $method = "swiggy_price";
    else if ($_GET['method'] == "zomato")
        $method = "zomato_price";
    else if ($_GET['method'] == "gst")
        $method = "gst_price";
    // echo $method;
}
// print_r($_SESSION);
function showProduct($cat_id, $subid)
{
    global $con, $method, $admin_id, $restaurant; ?>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Add</th>
                <!-- <th>Type</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $sql =  "SELECT * FROM `product` WHERE `category` = $cat_id and `sub_category` = $subid  and restaurant = $restaurant and status = 1";
            if ($subid == false)
                $sql =  "SELECT * FROM `product` WHERE `category` = $cat_id  and restaurant = $restaurant and status = 1";

            $resproduct = mysqli_query($con, $sql);

            while ($product = mysqli_fetch_assoc($resproduct)) {
            ?>
                <tr>
                    <td><?php echo ($product['product_name']); ?></td>
                    <td><?php echo ($product[$method]); ?></td>
                    <td class="text-right py-0 align-middle">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" data-productid="<?php echo $product['product_id']; ?>" data-productname="<?php echo $product['product_name']; ?>" data-productprice="<?php echo $product[$method]; ?>" id="addProductCart_<?php echo $product['product_id']; ?>" onchange="addToCart(this);">
                            <label class="custom-control-label" for="addProductCart_<?php echo $product['product_id']; ?>"></label>
                        </div>
                    </td>
                    <!-- <td class="align-middle">
            <?php
                if ($product['food_type'] == 'veg') {
            ?>
              <img src="../img/icons/vegicon.png" style="width: 15px; height: 15px;" alt="veg">
            <?php } else { ?>
              <img src="../img/icons/nonvegicon.png" style="width: 15px; height: 15px;" alt="non-veg">
            <?php } ?>

          </td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<!-- end of showProduct -->

<?php
function fetchSubCategory($cat_id)
{
    global $con, $admin_id, $restaurant;

    $sql = "SELECT * FROM subcategory where `cat_id` = $cat_id  and restaurant = $restaurant";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) < 1)
        showProduct($cat_id, false);
    // print_r($res);
    else {
        while ($sub = mysqli_fetch_assoc($res)) {
            $subid = $sub['id'];

?>


            <div class="row">
                <div class="col-md-12 collapsed-card">
                    <div class="card card-primary ">
                        <div class="card-header" data-card-widget="collapse">
                            <h3 class="card-title"><?php echo ($sub['name']); ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php showProduct($cat_id, $subid);
                            ?>
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div>
            </div>
<?php }
    }
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
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- select2  css -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        #restName {
            font-family: Hack, sans-serif;
            font-weight: bolder;
            text-transform: uppercase;
            font-size: 2rem;
            text-shadow: 1px 1px 1px yellow,
                2px 2px 1px yellow;
            text-align: center;
            /* border: 1px solid black; */
            border-radius: 3px;
            color: green;
            letter-spacing: 2px;
            word-spacing: 4px;
            /* display: inline-block; */

        }
    </style>
</head>

<body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
    <div class="wrapper">



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            <div class="row mb-2">
                <div class=" col-sm-12">
                    <?php
                    $sql = "SELECT name FROM `restaurant` WHERE restaurantid = $restaurant and status = 1";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) < 1) {
                    ?>
                        <script>
                            swal("Contact to Administration ", "Your ID is Not Activated", "warning")
                                .then((res) => {
                                    window.location = "./user/logout.php";
                                })
                        </script>
                    <?php
                    }
                    ?>
                    <!-- <span class="btn btn-warning btn-sm"> To Know Update's Click Here</span> -->

                </div><!-- /.col -->
                <marquee behavior="slide" direction="right">

                    <h2 id="restName"><?php echo mysqli_fetch_assoc($res)['name']; ?> </h2>
                </marquee>
                <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              </ol>
            </div> -->
                <!-- /.col -->
            </div><!-- /.row -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- <div class="row" style="margin-bottom: 10px;">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" onchange="changetToTableView(this);" id="customSwitch">
                            <label class="custom-control-label" for="customSwitch">Table View</label>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="row">
                                <?php
                                if ($restaurant == "" || $admin_id == "") {
                                    if (isset($_SESSION['token'])) {

                                        ($user->fetchUser($_SESSION['token']));
                                    } else $isLogined = false;
                                }
                                // print_r($user);
                                $sql = "SELECT * FROM category  WHERE restaurant = $user->restaurant AND status = true ";
                                $n = mysqli_query($con, $sql);
                                $i = 1;
                                if (mysqli_num_rows($n) > 0)
                                    while ($row = mysqli_fetch_assoc($n)) {
                                        $cat_id = $row['cat_id'];
                                        if ($i++ % 4 == 0) {
                                            echo '</div><div class="row">';
                                        } ?>
                                    <div class="col-md-4 ">
                                        <div class="card card-primary collapsed-card">
                                            <div class="card-header" data-card-widget="collapse">
                                                <h3 class="card-title"><?php echo ($row['cat_name']); ?></h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body" style="padding-left: 0; padding-right:0; padding-bottom:0; padding-top:4px">
                                                <?php
                                                fetchSubCategory($cat_id);
                                                ?>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                <?php }
                                else echo "No Record found";

                                ?>
                            </div><!-- /.row -->

                        </div>
                        <!-- /.col -->
                        <div class="col-lg-4 table-responsive">
                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-plus"> Book Your Table </i>
                                    </button>
                                    <!-- Pop Window Body -->
                                    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Welcome</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card card-success">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Add Details</h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <!-- form start -->
                                                        <form>
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="customer_mob_no">Mobile No.</label>
                                                                    <input type="number" class="form-control" id="customer_mob_no" placeholder="Enter Mobile No."><br>
                                                                    <label for="customer_name">Customer Name</label>
                                                                    <input type="text" class="form-control" id="customer_name" placeholder="Enter Customer Name">
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" class="btn btn-primary" disabled id="btnAddShortCustomer">Add</button>
                                                                <button type="submit" disabled="true" class="btn btn-primary" id="btnCustomerSelect">Select</button>
                                                            </div>

                                                    </div>
                                                    <!-- /.card-body -->


                                                    </form>


                                                </div>
                                                <!-- <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> -->
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /popup -->

                                    <!-- <a href="posprint.php?orderid=<?php echo $orderid; ?>" class="btn btn-warning" id="#"><i class="fas fa-eye"> View Order * </i></a>
                                    <a href="#" class="btn btn-secondary float-right" id="billingprint"><i class="fas fa-rupee-sign"> Billing </i> </a> -->

                                </div>
                            </div><br>
                            <!-- Custormer Details  -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">

                                        <h3 id="selectCustomerBillName" class="form-control">
                                            Before Order Book Your Table

                                        </h3>
                                    </div>

                                </div>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        Food Cart
                                        <small class="float-right">Date: <?php echo date("d-m-Y"); ?></small>
                                    </h4>
                                </div>
                                <input type="text" hidden id="tableid" value="<?php echo $tableid; ?>">
                                <input type="text" hidden id="tablegroup" value="<?php echo $groupid; ?>">
                                <input type="text" hidden id="table" value="<?php echo $table; ?>">
                                <input type="text" hidden id="method" value="<?php echo $method; ?>">
                                <input type="text" hidden id="admin_id" value="<?php echo $admin_id; ?>">
                                <input type="text" hidden id="restaurant" value="<?php echo $restaurant; ?>">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cartItems">


                                        <tr>
                                            <!-- <td></td> -->
                                            <td></td>
                                            <td> </td>
                                            <td><b>Grand Total</b></td>
                                            <td id="grandtotalprice">00</td>
                                            <td> </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="row no-print">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- To Do Get Payment Online -->
                                            <a href="#" class="btn btn-success m-1" id="" disabled><i class="fas fa-print"> Pay * </i></a>

                                            <a href="#" class="btn btn-warning float-left m-1" id="btnkotprint" disabled><i class="fas fa-print"> COD </i></a>
                                        </div>
                                        <!-- <a href="#" class="btn btn-default float-right" id="btnprintbill"><i class="fas fa-print"></i> COT and Save</a> -->
                                        <!-- <div class="col-6">
                                            <a href="#" class="btn btn-default float-right" id="btnbillclear"><i class="fas fa-trash" style="color:red"> Clear Order </i></a>
                                        </div> -->

                                    </div>
                                </div>
                            </div>



                        </div><!-- /.col -->
                    </div><!-- /.row -->


                    <br>
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
    <!-- select2 js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <?php include_once('isloginfooter.php'); ?>


    <script>
        var i = 0;
        var grandtotalPrice = 0;
        // $(document).ready(function() {
        const table = {
            tableid: $('#tableid').val() != '' ? $('#tableid').val() : 0,
            tablegroup: $('#tablegroup').val() != '' ? $('#tablegroup').val() : 0,
            table: $('#table').val() != '' ? $('#table').val() : 0,
        }
        var type = $('#method').val() != '' ? $('#method').val() : "store_price";
        var admin_id = $('#admin_id').val() != '' ? $('#admin_id').val() : 0;
        var restaurant = $('#restaurant').val() != '' ? $('#restaurant').val() : 0;
        // product object acc to bill list
        var customer = $("#selectCustomerBillName").val().split(",");
        const products = {
            data: [],
            table: table,
            type: type,
            admin_id: admin_id,
            restaurant: restaurant,
            customerName: "Cash",
            customerID: 0,
            customerType: "Cash",
            itemsToggle: [],
            kot: 0,
            orderid: 0,
            billNo: 0,
            todayOrderNo: 0,
            totalPrice: 0,
            discount: 0,
            recived: 0,
            paid: 0,
            balance: 0

        };
        // console.log(products)
        fetchorderid();

        // change to table view
        function changetToTableView(e) {
            if (e.checked === true)
                location.replace("genbill1.php?" + window.location.search.substr(1).split("?")[0]);
        }


        // calculate final bill
        function calGrandTotal(update, price, type) {
            // console.log(products);
            const grandtotal = $('#grandtotalprice')[0];
            if (products.table > 0)
                $.ajax({
                    url: constant.url + "table/order.php",
                    method: "POST",
                    data: JSON.stringify({
                        data: products,
                        admin_id: products.admin_id,
                        restaurant: products.restaurant,
                        table: products.table
                    }),
                    contentType: 'application/json',
                    error: (data) => {
                        // console.log(data);
                        swal("Error Occurred", "Something going wrong", "error");
                    }
                });
            grandtotal.innerHTML = parseInt(products.totalPrice);

        }
        // cal subtotal
        function calPrice(root, qty, t) {
            // console.log(root.parentNode.querySelectorAll("#subTotal"));
            var tr = root.parentNode;
            var subTotal = tr.querySelectorAll("#subTotal")[0];
            var price = tr.querySelectorAll("#price")[0];
            // var subTotalPrice = subTotal.innerHTML;
            // var finalPrice = (qty * price.innerHTML);
            products.data[t].qty = parseFloat(qty);
            products.totalPrice -= parseInt(products.data[t].subtotal);
            // console.log(); // = tprice;
            var totalPrice = qty * products.data[t].price;
            products.data[t].subtotal = totalPrice;
            subTotal.innerHTML = totalPrice;
            products.totalPrice += parseInt(totalPrice);
            // console.log(products);

            // grandtotalPrice = grandtotalPrice - parseInt(price.innerHTML) + finalPrice;
            calGrandTotal(true);
        }
        // enable function to print and kotprint btn 
        function enbalePrintBtn(check) {
            if (check === true) {
                $("#btnprintbill").disabled = true;
                $("#btnkotprint").disabled = true;
            } else {

                $("#btnprintbill").disabled = false;
                $("#btnkotprint").disabled = false;
            }

        }

        // func to remove product from cart
        function removeProduct(id) {
            const index = products?.itemsToggle.findIndex((item) => item.id == id);
            if (index == -1) {
                console.log('item not found')
                return;
            }
            const btn = products.itemsToggle[index].item;
            btn.checked = false;

            addToCart(btn)

        }

        // fun to add item into bill list
        function addToCart(e, savedProduct) {
            // toggle print btn
            if (products.data.length > 0) {
                enbalePrintBtn(true);
            } else {
                enbalePrintBtn(false)
            }

            var price = 0;
            var qty = 1;
            var id, name;
            // console.log(e)
            $(e).attr("data-productid", (i, d) => id = d);
            $(e).attr("data-productname", (i, d) => name = d);
            $(e).attr("data-productprice", (i, d) => price = d);

            var subtotal = price;
            // if item added
            if (e.checked === true) {
                // alert("added");
                if (savedProduct != null) {
                    products.data.push(savedProduct);
                    price = savedProduct.price;
                    subtotal = savedProduct.subtotal; //price;
                    qty = savedProduct.qty;
                    products.totalPrice += parseFloat(subtotal);
                } else {
                    products.data[i] = {
                        id,
                        name,
                        price: parseFloat(price),
                        qty: 1,
                        subtotal: price,

                    }
                    products.totalPrice += products?.data[i].price;
                }
                // console.log(products);
                calGrandTotal(false, price, true);

                var itemRow = '<tr id="cartItem' + id + '">';
                // itemRow += '<td>' + (i + 1) + '</td>';
                itemRow += '<td>' + name + '</td>';
                itemRow += '<td><input min="1" style="width:42px" onchange="calPrice(this.parentNode,this.value,' + i + ' );" type="number" value=' + qty + ' / ></td>';
                itemRow += '<td id="price">' + price + '</td>';
                itemRow += '<td id="subTotal">' + subtotal + '</td>';
                itemRow += `<td id="removeItemBtn" onClick=removeProduct(${id})><i class="fas fa-trash" style="cursor:pointer"></i></td>`;
                itemRow += ' </tr>';
                $("#cartItems").prepend(itemRow)

                i++;
                products?.itemsToggle?.push({
                    id,
                    item: e
                });
            }
            // if item removed
            if (e.checked === false) {
                i--;
                var product = id;
                products.data.map((v, i) => {
                    if (v.id == product) {
                        products.totalPrice -= v.subtotal;

                        products.data.splice(i, 1);
                        calGrandTotal();
                        $("#cartItem" + product).remove();

                    }
                    // 
                    var index = products?.itemsToggle.indexOf({
                        item: e
                    });
                    if (index !== -1) {
                        products?.itemsToggle.splice(index, 1);
                    }
                });
            }

        }
        // fetch customer name
        function fetchCustomerName(id) {
            // console.log("pr " + products)
            $.ajax({
                method: "POST",
                url: constant.url + "customer/fetchbyid.php",
                data: JSON.stringify({
                    user_id: id != null ? id : 0,
                    restaurant: $('#restaurant').val() != null ? $('#restaurant').val() : 0,
                }),
                contentType: "application/json",
                dataType: "json",
                success: (res) => {
                    // console.log(res);
                    if (res.success) {
                        const arr = res.data;
                        products.customerID = arr.user_id;
                        products.customerName = arr.user_name;
                        $('#selectCustomerBillName').html(products.customerName);
                    }
                }
            });
        }
        // clear table
        function clearTable(alert) {
            $.ajax({
                url: constant.url + "table/update.php",
                method: "POST",
                data: JSON.stringify({
                    restaurant: restaurant,
                    table: products.table,
                    status: 0
                }),
                contentType: "application/json",
                dataType: "json",
                success: function(result) {
                    // console.log(result);
                    if (result.success == true) {
                        if (alert === true)
                            swal("You done it", "Table successfully cleared", "success")
                            .then((res) => {
                                if (res)
                                    location.reload()
                            });
                    }
                },
            });
        }

        $(document).ready(function() {
            $('#modal-default').modal({
                show: true
            });
        });

        //kot print bill on click
        $("#btnkotprint").on("click", () => {
            // console.log("clicked");
            if (products.data.length < 1) return;
            $.ajax({
                url: constant.url + "order/orders.php",
                method: "POST",
                data: JSON.stringify(products),
                contentType: "application/json",
                dataType: "json",
                success: function(result) {
                    // console.log(result);
                    if (result.success == true) {
                        // clearTable();
                        products.orderid = result.data.orderid;
                        products.todayOrderNo = result.data.today_orders;
                        console.log(result.data);
                        // alert("redirected to print page")
                        localStorage.setItem("kotbill", JSON.stringify(products));
                        var print = window.open(`poskotprint.php?table=${products.table.table}&tablegroup=${products.table.tablegroup}`, 'PRINT', "height=800,width=800");
                        // print.document.close();
                        // print.print();
                        // print.close();
                        // printDiv("print");
                        // location.reload();
                    }
                },
            });
        });

        //final print bill on click
        $("#btnprintbill").on("click", () => {
            // console.log("clicked");
            if (products.data.length < 1) return;
            $.ajax({
                url: constant.url + "order/orders.php",
                method: "POST",
                data: JSON.stringify(products),
                contentType: "application/json",
                dataType: "json",
                success: function(result) {
                    // console.log(result);
                    if (result.success == true) {
                        clearTable();
                        products.orderid = result.data.orderid;
                        // alert("redirected to print page")
                        console.log(products);
                        localStorage.setItem("bill", JSON.stringify(products));
                        window.open("printbill.php?orderid=" + products.orderid, "_blank");
                        location.reload();
                    }
                },
            });
        });


        //final print bill on click without saving to db
        $("#billingprint").on("click", () => {
            // console.log("clicked");
            window.open("printbill.php?orderid=" + products.orderid, "_blank");
            location.reload();
        });

        // clear bill list
        $("#btnbillclear").on("click", () => {
            // console.log("clicked");
            // if (products.data.length < 1) return;
            clearTable(true);
        });
        // });

        //fetchorderid
        function fetchorderid() {
            $.ajax({
                url: constant.url + "table/fetchstatus.php",
                method: "POST",
                data: JSON.stringify({
                    restaurant: restaurant,
                    table: products.table,
                    status: 0
                }),
                contentType: "application/json",
                dataType: "json",
                success: function(result) {
                    console.log(result);
                    if (result.success == true) {
                        // console.log(result);
                        products.orderid = result.data.orderid;
                        products.billNo = result.data.bill_no;
                        products.kot = result.data.kot;
                        // console.log(products);
                        fetchCustomerName(result.data.user_id);
                    } else {
                        if (result.data == null)
                            $("#billingprint").hide();
                        else if (result.data.kot == null)
                            $("#billingprint").hide();
                        if (alert === true)
                            swal("Error", "Something went wrong", "error")
                            .then((res) => {
                                if (res)
                                    location.reload()
                            });
                    }
                },
            });
        }


        $("#idCustomerType").on("change", () => {
            products.customerType = $("#idCustomerType").val();
            // console.log(products)
        });
        // print function
    </script>

    <!-- select search -->
    <!-- <script>
    $('#selectCustomerBillName').select2({
      ajax: {
        method: 'POST',
        url: constant.url + '/customer/fetch.php',
        data: JSON.stringify({
          restaurant: restaurant
        }),
        dataType: "json",
        processResults: function(data) {
          // data = data.data;
          // params.page = params.page || 1;
          var data1 = $.map(data.data, function(obj) {
            obj.id = obj.id || obj.user_id; // replace pk with your identifier
            obj.text = obj.text || obj.user_name; // replace pk with your identifier

            return obj;
          });
          console.log(data1)
          return {
            results: data1
          };
        }


      }
    
    });
  </script> -->
    <!-- <script src="scripts/request.js"></script> -->
</body>

</html>