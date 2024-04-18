<!DOCTYPE html>
<html lang="en">
<?php require_once "../config.php";

$orderid = isset($_GET['orderid']) ? $_GET['orderid'] : null;
$sql = "SELECT a.name as restaurant,a.city,a.state,a.country,a.district,a.mobile,
b.name as name,b.bill_no,b.date,b.orderid,b.order_value as total
from restaurant a, orders b where b.restaurant = a.restaurantid and b.orderid  = '$orderid'";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  $customerName = $row['name'];
?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $SITE_NAME ?></title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>

  <body class="layout-top-nav control-sidebar-slide-open" style="height: auto;">
    <div class="wrapper">


      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-md-6">
                    <h2 class="page-header">
                      <i class="fas fa-hotel"></i><?php echo $row['restaurant']; ?>
                    </h2>
                  </div>
                  <div class="col-md-6">
                    <p class="float-right">Date: <?php echo  date('d-m-Y', strtotime($row['date'])); ?></p>
                  </div>

                </div>



              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">

                <address>
                  <strong id="restaurant">Address</strong><br>
                  <address id="address">
                    <span id="city"></span><?php echo $row['city']; ?> <span id="district"><?php echo $row['district']; ?></span><br>
                    <span id="state"><?php echo $row['state']; ?></span>
                    <span id="country"><?php echo $row['country']; ?></span><br>
                    Phone: <span id="phone"><?php echo $row['mobile']; ?></span><br>
                  </address>

                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong><span id="customerName"><?php echo $customerName; ?></strong><br>
                  <!-- <strong><span id="customerName"><?php echo $customerMob; ?></strong><br> -->
                  <!-- 795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com -->
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Bill No. : <span id="bill"><?php echo $row['bill_no']; ?></span></b><br>

                <!-- <b>Order No. : <span id="orderid"><?php echo $row['orderid']; ?></span></b><br> -->
                <!-- <b> <span id="orderid"><?php echo ("GST Included"); ?></span></b><br> -->
                <br>
                <!-- <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567 -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">

              <!-- /.col -->
              <div class="col-12 table-responsive">

                <!-- <div class="col-12">
                  <h4>
                    Bill
                    <small class="float-right">Date: <?php echo date("d-m-Y"); ?></small>
                  </h4>
                </div> -->
                <!-- /.col -->


                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Item</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody id="cartItems">
                    <?php
                    $sql = "SELECT a.product_name as name, b.price,b.qty,b.subtotal, c.order_value from product a, orders_product b, orders c where a.product_id = b.product_id and b.orderid = c.orderid and b.orderid = '$orderid'";
                    $rest = mysqli_query($con, $sql);
                    $i = 1;
                    while ($order = mysqli_fetch_assoc($rest)) {

                    ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['qty']; ?></td>
                        <td><?php echo $order['price']; ?></td>
                        <td><?php echo $order['subtotal']; ?></td>

                      </tr>
                    <?php }
                    $total_price = $row['total'];
                    ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>Total</b></td>
                      <td id="grandtotalprice"><?php echo floor($total_price); ?></td>
                    </tr>
                    <tr>

                      <!-- <td></td> -->
                      <td><b>Mode</b></td>
                      <td><select id="mode" class="js-example-basic-single form-control">
                          <option selected value="Cash">Cash</option>
                          <option value="Bank">Bank</option>
                          <option value="Gpay">GPay</option>
                          <option value="PhonePe">PhonePe</option>
                          <option value="UPI">UPI</option>
                          <option value="Other">Other</option>
                        </select></td>
                      <td><b></b></td>
                      <td></td>

                    </tr>
                    <tr>
                      <!-- <td></td> -->
                      <td><b>Discount (%)</b></td>
                      <td><select id="discount" class="js-example-basic-single form-control">
                          <option selected value=0>00</option>
                          <option value=5>5%</option>
                          <option value=10>10%</option>
                          <option value=15>15%</option>

                          <option value=20>20%</option>
                          <option value=25>25%</option>
                          <option value=30>30%</option>

                          <option value=40>40%</option>

                          <option value=50>50%</option>
                          <option value=60>60%</option>
                          <option value=70>70%</option>
                          <option value=80>80%</option>
                        </select></td>
                      <td><b>Discount Amount</b></td>
                      <td id="discount_amount">00</td>
                    </tr>
                    <tr>
                      <!-- <td></td> -->
                      <td><b>Offer (%)</b></td>
                      <td><select id="offer" class="js-example-basic-single form-control">
                          <option selected value=0>00</option>
                          <?php
                          $sql = "SELECT * FROM `offers` WHERE status =1 order by offer_value";
                          $res = mysqli_query($con, $sql);
                          while ($row = mysqli_fetch_assoc($res)) { ?>
                            <option value="<?php echo $row['offer_value']; ?>"><?php echo $row['offer_text']; ?></option>
                          <?php } ?>
                        </select></td>
                      <td><b>Offer Amount</b></td>
                      <td id="offer_amt">00</td>
                    </tr>

                    <tr>
                      <!-- <td></td> -->
                      <td><b>Service Charge (%)</b></td>
                      <td><select id="service_charge" class="js-example-basic-single form-control">
                          <option selected value=0>00</option>
                          <option value=5>5%</option>


                          <option value=12>12%</option>

                          <option value=18>18%</option>
                          <option value=28>28%</option>

                        </select></td>
                      <td><b>Service Charge Amt</b></td>
                      <td id="service_charge_amt">00</td>
                    </tr>
                    <tr>
                      <!-- <td></td> -->
                      <td><b>GST (%)</b></td>
                      <td><select id="gst" class="js-example-basic-single form-control">
                          <option selected value=0>00</option>
                          <option value=5>5%</option>
                          <option value=8>8%</option>
                          <option value=12>12%</option>
                          <option value=18>18%</option>
                        </select></td>
                      <td><b>GST Amount</b></td>
                      <td id="gst_amount">00</td>
                    </tr>
                    <?php if (strtolower($customerName)  != 'cash') { ?>
                      <tr>
                        <!-- <td></td> -->
                        <td><b>Received</b></td>
                        <td><input type="number" min=0 class="form-control" id="received" value=<?php echo floor($total_price); ?>></td>
                        <td id="receivedRemarks" style="display: none">
                          <textarea type="text" class="form-control form-input" placeholder="Remarks for this Payment" id="remarks"></textarea>
                        </td>
                      </tr>
                    <?php  } ?>
                    <tr>
                      <td><b>Grand Total</b></td>
                      <td id="grand_total">00</td>
                    </tr>

                  </tbody>
                </table>
                <div class="row no-print">
                  <div class="col-12">
                    <a href="#" class="btn btn-default" id="btnprintbill"><i class="fas fa-print"></i>Print Out</a>

                  </div>
                </div>
              </div>
              <!-- /.col -->

            </div>

            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->



    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    <!-- <script>
    window.addEventListener("load", window.print());
  </script> -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="scripts/request.js"></script>
    <script>
      $(document).ready(function() {
        let params = new URLSearchParams(location.search);
        const orderid = params.get("orderid");
        const bill = {
          total: 0,
          discount: 0,
          balance: 0,
          received: 0,
          grand_total: 0,
          offerPercentage: 0,
          offerAmount: 0,
          discountPercentage: 0,
          serviceChargePercent: 0,
          serviceChargeAmount: 0,
          gst: 0,
          gst_amount: 0,
          orderid: orderid,
          mode: "Cash",
          remarks: ""
        }
        // console.log(JSON.parse(localStorage.getItem("bill")));
        // const products = JSON.parse(localStorage.getItem("bill"));

        if (orderid == null) return;
        const info = {
          orderid: orderid
        };
        $.ajax({
          url: constant.url + "order/orderidfetch.php",
          method: "POST",
          data: JSON.stringify(info),
          contentType: "application/json",
          dataType: "json",
          success: function(result) {
            console.log(result);
            if (result.success == true) {
              bill.total = parseInt(result.data[0].order_value);
              // console.log(bill)
              bill.received = bill.total;
              bill.grand_total = parseInt(result.data[0].order_value);
              $('#grand_total').html(bill.total);
            }
          },
        });
        $('#mode').on('change', () => {
          bill.mode = $('#mode').val();
        })
        $('#discount,#received').on('input', (e) => {
          const billDiscountPercentage = $('#discount').val() != null ? $('#discount').val() : 0;
          const billDiscountAmount = Math.round(bill.total * billDiscountPercentage / 100);
          bill.discount = parseInt(billDiscountAmount);
          $('#discount_amount').html(billDiscountAmount);

          console.log(bill.discount);
          // bill.grand_total = Math.round(bill.total - bill.discount + bill.gst_amount);
          if (e.currentTarget.id != "discount") {
            if ($('#received').val() == 0)
              $('#receivedRemarks').css("display", "block");
            else
              $('#receivedRemarks').css("display", "none");

          }
          bill.received = parseInt($('#received').val() != null ? $('#received').val() : 0);
          bill.balance = parseInt(Math.round(bill.grand_total - bill.received));
          finalAmount(e.currentTarget.id);

          console.log(bill)
        })
        $('#offer').on('change', () => {
          billOfferPercentage = parseInt($('#offer').val() != null ? $('#offer').val() : 0);
          billOfferAmount = parseInt(Math.round(bill.total * billOfferPercentage / 100));
          bill.offerPercentage = billOfferPercentage;
          bill.offerAmount = billOfferAmount;
          $('#offer_amt').html(billOfferAmount);

          finalAmount();
        });
        // $('#discount').on('input', () => {
        //   bill.discount = $('#discount').val() != null ? $('#discount').val() : 0;
        //   $('#received').val(bill.total - bill.discount);
        //   bill.received = bill.total - bill.discount;

        //   $('#grand_total').html(bill.grand_total);
        //   console.log(bill)
        // })
        $('#gst').on('change', (e) => {
          bill.gst = $('#gst').val();
          billGstAmount = parseInt(Math.round(bill.total * bill.gst / 100));
          bill.gst_amount = billGstAmount;
          // bill.grand_total = Math.round(bill.grand_total + bill.gst_amount);
          finalAmount(e.currentTarget.id);
          $('#gst').attr('disabled', true)
          // console.log(bill);
        })
        $('#service_charge').on('change', function() {
          const serviceChargePercent = parseInt($('#service_charge').val());
          const serviceChargeAmount = parseInt(Math.round(bill.total * serviceChargePercent / 100));
          bill.serviceChargeAmount = serviceChargeAmount;
          bill.serviceChargePercent = serviceChargePercent;
          $('#service_charge_amt').html(serviceChargeAmount);
          finalAmount();
        });
        $('#receivedRemarks').change(() => {
          bill.remarks = $('#remarks').val();
        });

        function updateUI(id) {
          $('#gst_amount').html(bill.gst_amount);
          if (id != "received")
            $('#received').val(bill.grand_total);
          $('#grand_total').html(bill.grand_total);
          // finalAmount();
          // $('#grand_total').html(bill.grand_total);

        }

        function finalAmount(id) {
          bill.grand_total = bill.total - (bill.discount + bill.offerAmount) + bill.gst_amount + bill.serviceChargeAmount;
          console.log('finalAmount', bill)
          if (id)
            updateUI(id);
          else updateUI();
        }


        $('#btnprintbill').on('click', () => {
          bill.received = $('#received').val() != null ? $('#received').val() : 0;
          // bill.grand_total=bill.total;
          $.ajax({
            url: constant.url + "order/orderidupdate.php",
            method: "POST",
            data: JSON.stringify(bill),
            contentType: "application/json",
            dataType: "json",
            success: function(result) {
              console.log(result);
              if (result.success == true) {
                window.location.replace('posprint.php?orderid=' + bill.orderid);
              } else {
                swal("Error Ocurred", "Contact to administrator")
              }
            },
          });
        })


      });
    </script>
  </body>
<?php } else { ?>
  there is nothing added to cart
<?php } ?>

</html>