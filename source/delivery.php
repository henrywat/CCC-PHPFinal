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
<?php include "include/head.php"; ?>
<body>

    <!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

    <!-- Hero -->
    <div class="pagetitle w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;DELIVERY & PAYMENT&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>
    <!-- CART CONFIRM -->
<?php
$sql = "SELECT full_name, phone, address, credit_card FROM ecom.users WHERE id=?;";
$result = $conn->execute_query($sql, [$_SESSION["uid"]]);
$row = $result->fetch_assoc();
?>
    <div class="w3-content w3-container w3-padding-64">
        <form action="action/do_place_order.php" method="post">
            <h3 class="w3-text-teal">Delivery Information</h3>
            <label class="w3-text-teal"><b>Full Name</b></label>
            <input class="w3-input w3-border" name="full_name" type="text" value="<?=$row["full_name"]?>" required>
            <br>
            <label class="w3-text-blue"><b>Phone</b></label>
            <input class="w3-input w3-border" name="phone" type="text" value="<?=$row["phone"]?>" required>
            <br>
            <label class="w3-text-blue"><b>Address</b></label>
            <input class="w3-input w3-border" name="address" type="text" value="<?=$row["address"]?>" required>
            <p>
            <h3 class="w3-text-blue">Payment Information</h3>
            <label class="w3-text-blue"><b>Card Number</b></label>
            <input class="w3-input w3-border" name="credit_card" type="text" value="<?=$row["credit_card"]?>" required></p>
            <p>
            <div class="w3-row">
                <div class="w3-right-align">
                    <input type="submit" class="w3-btn w3-sand w3-hover-red w3-round-large" value="Place Order ->">
                </div>
            </div>
        </form>
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

