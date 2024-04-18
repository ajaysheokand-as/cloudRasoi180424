<!DOCTYPE html>
<html lang="en">
<?php require_once "../config.php";

$orderid = isset($_GET['orderid']) ? $_GET['orderid'] : null;
$sql = "SELECT a.name as restaurant,a.city,a.gst,a.state,a.country,a.district,a.mobile,
b.name as name,b.bill_no,b.date,b.orderid,b.order_value as total
from restaurant a, orders b where b.restaurant = a.restaurantid and b.orderid  = '$orderid'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        * {
            font-size: 12px;
            font-family: 'Arial Black';
        }

        td,
        th,
        tr,
        table {
            border-top: 1px dotted black;
            border-collapse: collapse;
        }

        td.description,
        th.description {
            width: 150px;
            max-width: 275px;
        }

        td.quantity,
        th.quantity {
            width: 70px;
            max-width: 70px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 100px;
            max-width: 100px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
    <title>Receipt</title>
</head>

<body onload="window.print();">
    <div class="ticket">
        <!-- <img src="./logo.png" alt="Logo"> -->
        <p class="centered"><b style="font-size: 16px;"><?php echo $row['restaurant']; ?></b>
            <br><?php echo $row['city']; ?>
            <br>M.No. <?php echo $row['mobile']; ?>
        </p>
        <hr>
        GST No: <b> <?php echo $row['gst']; ?> </b>
        <hr>
        Name : <b> <?php echo $row['name']; ?> </b>
        <hr>
        Date: <?php echo  date('d-m-Y', strtotime($row['date'])); ?> <br>
        Bill No. <?php echo $row['bill_no']; ?>
        <table>
            <thead>
                <tr>
                    <th class="description">Item</th>
                    <th class="quantity centered">Q.</th>
                    <th class="price">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT a.product_name as name, b.price,b.qty,b.subtotal, c.order_value,c.recived, c.pay_type as mode, c.balance, c.gst, c.gst_amount, c.paid as grand_total, c.discount,c.offer, c.service_charge  from product a, orders_product b, orders c where a.product_id = b.product_id and b.orderid = c.orderid and b.orderid = '$orderid'";
                $rest = mysqli_query($con, $sql);
                $i = 1;
                if (mysqli_num_rows($rest) > 0)
                    while ($order = mysqli_fetch_assoc($rest)) {
                        $recived = $order['recived'];
                        $grand_total = floor($order['grand_total']);
                        $mode = $order['mode'];
                        $balance = floor($order['balance']);
                        $total = floor($order['order_value']);
                        $discount = $order['discount'];
                        $gst = $order['gst'];
                        $gst_amount = $order['gst_amount'];
                        $offer = $order['offer'];
                        $service_charge = $order['service_charge'];
                ?>
                    <tr>

                        <td class="description"><?php echo $order['name']; ?></td>
                        <td class="quantity centered"><?php echo $order['qty']; ?></td>
                        <td class="price"><?php echo $order['price']; ?></td>

                    </tr>
                <?php } ?>

                <tr>

                    <td class="description"><b>TOTAL</b></td>
                    <!-- <td class="quantity"></td> -->
                    <td colspan="2" class="price"><b><?php echo $total; ?></b></td>
                </tr>
                <?php if ($discount > 0) { ?>
                    <tr>

                        <td class="description">Discount</td>
                        <!-- <td class="quantity"></td> -->
                        <td colspan="2" class="price"><b><?php echo $discount; ?></b></td>
                    </tr>
                <?php } ?>
                <?php if ($recived != $grand_total && $recived != 0) { ?>
                    <tr>

                        <td class="description">Recived</td>
                        <!-- <td class="quantity"></td> -->
                        <td colspan="2" class="price"><b><?php echo $recived; ?></b></td>
                    </tr>
                <?php } ?>
                <?php if ($balance > 0) { ?>
                    <tr>

                        <td class="description"><b>Balance</b></td>
                        <!-- <td class="quantity"></td> -->
                        <td colspan="2" class="price"><b><?php echo $balance; ?></b></td>
                    </tr>
                <?php } ?>
                <?php if ($gst_amount > 0) { ?>
                    <tr>

                        <td class="description"><b>GST</b></td>
                        <!-- <td class="quantity"></td> -->
                        <td colspan="2" class="price"><b><?php echo ($gst . "%"); ?></b></td>
                    </tr>
                <?php } ?>
                <?php if ($offer > 0) { ?>
                    <tr>

                        <td class="description"><b>Offer</b></td>
                        <!-- <td class="quantity"></td> -->
                        <td colspan="2" class="price"><b><?php echo ($offer . "%"); ?></b></td>
                    </tr>
                <?php } ?>
                <?php if ($service_charge > 0) { ?>
                    <tr>

                        <td class="description"><b>Service Charge</b></td>
                        <!-- <td class="quantity"></td> -->
                        <td colspan="2" class="price"><b><?php echo ($service_charge . "%"); ?></b></td>
                    </tr>
                <?php } ?>

                <tr>

                    <td class="description"><b>Grand Total</b></td>
                    <td class="quantity"></td>
                    <td colspan="2" class="price"><b><?php echo $grand_total; ?></b></td>
                </tr>

                <tr>

                    <td class="description">By</td>
                    <td colspan="2" class="price"><b><?php echo $mode; ?></b></td>


                </tr>
            </tbody>
        </table>
        <p class="centered" style="font-size: 8px;">Thanks for your visit!
            <br>Powered By: cloudrasoi.com
        </p>
        <br>
        <hr>
    </div>

    <div style="margin-top:100px; margin-left:60px;" class="hidden-print">
        <button onclick="window.print()">Print</button>
    </div>
    <!-- <button id="btnPrint" class="hidden-print">Print</button> -->
    <!-- <script src="script.js"></script> -->
    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>