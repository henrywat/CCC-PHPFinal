<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- HTML header --> 
<?php include "include/head.php"; ?>
<body>

    <!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

<?php
// get product id from query string
$pid = $_GET["pid"];

// get product details
$sql = "select id, product, description, price, image from ecom.products where id=?;";
$rs_prod = $conn->execute_query($sql, [$pid]);
if ($rs_prod->num_rows > 0) $rowp = $rs_prod->fetch_assoc();
?>

    <!-- Hero -->
    <div class="pagetitle w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div> 
    </div>

    <!-- PRODUCT DETAIL -->
    <div class="w3-content w3-container w3-padding-64">
        <h1 class="w3-center w3-text-indigo"><em><?=$rowp["product"]?></em></h1>
        <div class="w3-row">
            <!-- product image -->
            <div class="w3-third w3-container">
            <img class="aboutimg1" src="img/prod/<?=$rowp["image"]?>" alt="<?=$rowp["product"]?>" title="<?=$rowp["product"]?>">
            </div>

            <!-- product description -->
            <div class="w3-rest w3-container">
                <form action="action/do_add_to_cart.php" method="post">
                <input type="hidden" name="pid" value="<?=$rowp["id"]?>">
                <div class="w3-col w3-content">
                    <p><?=$rowp["description"]?></p>
                </div>
                <div class="w3-col w3-xlarge w3-right-align">
                    $<?=number_format($rowp["price"], 2)?> each
                </div>
                <div class="w3-col w3-xlarge w3-right-align">
                    <?php
                $sql = "select id, color, hex from colors where id in (select col_id from product_colors where prod_id=?);";
                $rs_col = $conn->execute_query($sql, [$rowp["id"]]);
                if ($rs_col->num_rows > 0) {
                    while($rowcol = $rs_col->fetch_assoc()) {
?>
                    <input type="radio" name="col" value="<?=$rowcol["id"]?>" class="w3-tag w3-small">
                    <span class="w3-tag w3-small" style="background-color: <?=$rowcol["hex"]?>"><?=$rowcol["color"]?></span>
<?php
                    }
                }
?>
                </div>
                <div class="w3-col w3-right-align">
                        <select class="w3-select w3-border w3-round-large" name="qty" style="width: 50px;">
                            <option value="" disabled selected>Qty</option>
                            <option value="1" class="w3-tag w3-small">1</option>
                            <option value="2" class="w3-tag w3-small">2</option>
                            <option value="3" class="w3-tag w3-small">3</option>
                            <option value="4" class="w3-tag w3-small">4</option>
                            <option value="5" class="w3-tag w3-small">5</option>
                        </select>
                        <button class="w3-button w3-round-large w3-sand w3-hover-brown" type="submit">Add to Cart</button>
                    </form>
                </div>
            </div>

        </div> 
    </div>

    <!-- Footer -->
    <?php include "include/footer.php"; ?>

</body>
</html>

<?php
// close connection
$conn->close();
?>

