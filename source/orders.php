<?php
session_start();
$_SESSION["login_redirect"] = basename($_SERVER['PHP_SELF']);
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
    header("location: login.php");
    exit();
}
?>
<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- HTML header --> 
<?php include "include/head.php"; ?>
<body>

    <!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

    <!-- Hero -->
    <div class="pagetitle w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
<?php if ($_SESSION["uid"] == "0") { ?>
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;ALL ORDERS&nbsp;&nbsp;&nbsp;&nbsp;</span>
<?php } else { ?>
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;ORDERS&nbsp;&nbsp;&nbsp;&nbsp;</span>
<?php } ?>
        </div> 
    </div>
    <!-- CART DETAIL -->
    <div class="w3-content w3-container w3-padding-64" style="min-height: 65%;">
        <div class="w3-row">
        <table class="w3-table-all w3-margin">
            <thead>
                <tr class="w3-orange w3-text-white">
                    <th>#</th>
                    <th>Order ID</th>
<?php
$uid = $_SESSION["uid"];
if ($uid == "0") {
?>
                    <th>User</th>
                    <th>Name</th>
<?php } ?>
                    <th>Date and Time</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>

<?php
// pagination
if (!isset ($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$results_per_page = 10;
$page_first_result = ($page-1) * $results_per_page;

$uid = $_SESSION["uid"];
if ($uid == "0") {
    $sql = "select o.id, o.place_time, o.total_amount, o.status, u.name, o.full_name from ecom.orders o, ecom.users u where u.id = o.user_id order by place_time desc;";
    $result = $conn->query($sql);

    //determine the total number of pages available  
    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil ($number_of_result / $results_per_page);

    // execute query with LIMIT
    $sql = "select o.id, o.place_time, o.total_amount, o.status, u.name, u.full_name from ecom.orders o, ecom.users u where u.id = o.user_id order by place_time desc LIMIT ".$page_first_result.",".$results_per_page.";";
    $result = $conn->query($sql);

} else {
    $sql = "select id, place_time, total_amount, status from ecom.orders where user_id=? order by place_time desc;";
    $result = $conn->execute_query($sql, [$uid]);

    //determine the total number of pages available  
    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil ($number_of_result / $results_per_page);

    // execute query with LIMIT
    $sql = "select id, place_time, total_amount, status from ecom.orders where user_id=? order by place_time desc LIMIT ".$page_first_result.",".$results_per_page.";";
    $result = $conn->execute_query($sql, [$uid]);
}

$rowcount = 1;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fmt_time = date("d M Y H:i", strtotime($row["place_time"]));
?>
            <tr>
                <th><?=$page_first_result + $rowcount++?></th>
                <th><a href="order_detail.php?oid=<?=$row["id"]?>"><?=sprintf('%06d', $row["id"]);?></a></th>
                <?php
$uid = $_SESSION["uid"];
if ($uid == "0") {
?>
                <th><?=$row["name"]?></th>
                <th><?=$row["full_name"]?></th>
<?php } ?>
                <th><?=$fmt_time?></span></th>
                <th>$<?=number_format($row["total_amount"], 2)?></th>
<?php if ($uid == "0") { ?>
                <form action="action/do_update_status.php" method="post" id="f<?=$row["id"]?>">
                    <th>
                        <select name="status" onchange="document.getElementById('f<?=$row["id"]?>').submit();">
                            <option value="Pending" <?php if ($row["status"] == "Pending") { echo "selected"; } ?>>Pending</option>
                            <option value="Processing" <?php if ($row["status"] == "Processing") { echo "selected"; } ?>>Processing</option>
                            <option value="Delivering" <?php if ($row["status"] == "Delivering") { echo "selected"; } ?>>Delivering</option>
                            <option value="Delivered" <?php if ($row["status"] == "Delivered") { echo "selected"; } ?>>Delivered</option>
                            <option value="Cancelled" <?php if ($row["status"] == "Cancelled") { echo "selected"; } ?>>Cancelled</option>
                        </select>
                        <input type="hidden" name="oid" value="<?=$row["id"]?>">
                    </th>
                </form>
<?php } else { ?>
                <th><?=$row["status"]?></th>
<?php } ?>

            </tr>
<?php
    }
?>
        </table>
        </div>
<?php } else { ?>
            <tr><td colspan="5" align="center">No orders found.</td></tr>
            </table>
        </div>
<?php } ?>
        <div class="w3-center">
            <div class="w3-bar w3-border w3-round">
            <a href="orders.php" class="w3-bar-item w3-button">&laquo;</a>
<?php
    //display the link of the pages in URL  
    for($i = 1; $i<= $number_of_page; $i++) {
        if ($i == $page) {
            echo "            <span class=\"w3-bar-item w3-green\">".$i."</span>";
        } else {
            echo "            <a href=\"orders.php?page=".$i."\" class=\"w3-bar-item w3-button\">".$i."</a>";
        }
        
    }  
    ?>
            <a href="orders.php?page=<?=$number_of_page?>" class="w3-bar-item w3-button">&raquo;</a>
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

