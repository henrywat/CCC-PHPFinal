<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php"; ?>
<body>

    <!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

    <!-- Hero -->
    <div class="pagetitle w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;ORDER DETAIL&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div> 
    </div>
    <!-- CART DETAIL -->
<?php
        $oid = $_GET["oid"];
        //get order details
        $sql = "select place_time, total_amount, full_name, phone, address, status from ecom.orders where id=?;";
        $rs_order = $conn->execute_query($sql, [$oid]);
        $row_o = $rs_order->fetch_assoc();
        $fmt_time = date("d M Y H:i", strtotime($row_o["place_time"]));
        $total = $row_o["total_amount"];
        $time = strtotime($row["place_time"]);
        $full_name = $row_o["full_name"];
        $phone = $row_o["phone"];
        $address = $row_o["address"];
        
?>
    <div class="w3-content w3-container w3-padding-64">
    <div class="w3-row w3-margin w3-right-align w3-xlarge w3-text-red">
        Status: <b><?=$row_o["status"]?></b>
    </div>
    <div class="w3-row w3-margin w3-right-align">
        Order ID: <b><?=sprintf('%06d', $oid);?></b>, at <b><?=$fmt_time?></b>
    </div>

    
    <div class="w3-row w3-margin">
        <table class="w3-table-all">
            <thead>
                <tr class="w3-orange w3-text-white">
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                </tr>
            </thead>

<?php
        //get order items
        $sql = "select p.product, c.color, c.hex, oi.unit_price, oi.quantity from ecom.order_items oi, ecom.products p, ecom.colors c where oi.order_id=? and oi.product_id=p.id and oi.color_id=c.id;";
        $rs_items = $conn->execute_query($sql, [$oid]);
        $cnt = 1;
        while($row_i = $rs_items->fetch_assoc()) {
?>
            <tr>
                <th><?=$cnt++?></th>
                <th><?=$row_i["product"]?></th>
                <th><span class="w3-tag w3-small" style="background-color: <?=$row_i["hex"]?>"><?=$row_i["color"]?></span></th>
                <th>$<?=number_format($row_i["unit_price"], 2)?></th>
                <th><?=$row_i["quantity"]?></th>
            </tr>
<?php
        }
?>
            <tr><td colspan="5" class="w3-large w3-right-align">Total: $<?=number_format($total, 2)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
        </table>
        <h3 class="w3-text-teal">Delivery Information</h3>
        <label class="w3-text-teal">Full Name: </label><?=$full_name?>
        <br>
        <label class="w3-text-teal"><b>Phone: </b></label><?=$phone?>
        <br>
        <label class="w3-text-teal"><b>Address: </b></label><?=$address?>
        <p>
        <div class="w3-row">
            <div class="w3-right-align">
                <a href="orders.php" class="w3-btn w3-sand w3-hover-red w3-round-large"><- Back</a>
            </div>
        </div>
    </div>


        <div class="w3-row"><p>&nbsp;</p></div>
    </div>

    <!-- Footer -->
    <?php include "include/footer.php"; ?>

</body>
</html>

<?php
// close connection
$conn->close();
?>

