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
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;COLLECTIONS&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>

<?php
// admin add product
if (isset($_SESSION["loggedin"]) && $_SESSION["uid"] == "0") { ?>
    <div class="w3-content w3-container w3-padding-16 w3-right-align">
        <form action="product_add.php" method="get">
            <input type="hidden" name="cid" value="<?=$rowc["id"]?>">
            <button class="w3-button w3-round-large w3-sand w3-hover-purple" type="submit">Add Product</button>
        </form>
    </div>
<?php } ?>

    <!-- collections listing -->
<?php
$sql = "select id, category from ecom.categories order by category;";
$rs_cat = $conn->query($sql);
if ($rs_cat->num_rows > 0) {
    while($rowc = $rs_cat->fetch_assoc()) {
?>
    <div class="w3-content w3-container w3-padding-64">
        <div class="w3-container w3-light-grey w3-xxlarge w3-center w3-wide w3-black"><?=$rowc["category"]?></div>
        <table class="w3-table w3-bordered w3-striped">
<?php
        $sql = "select id, product from ecom.products where cat_id=? order by product;";
        $rs_prod = $conn->execute_query($sql, [$rowc["id"]]);
        if ($rs_prod->num_rows > 0) {
            while($rowp = $rs_prod->fetch_assoc()) {
?>
            <tr>
<?php if (isset($_SESSION["loggedin"]) && $_SESSION["uid"] == "0") { ?>
                <th class="w3-xlarge"><a href="product_update.php?pid=<?=$rowp["id"]?>"><?=$rowp["product"]?></a></th>
<?php } else { ?>
                <th class="w3-xlarge"><a href="product.php?pid=<?=$rowp["id"]?>"><?=$rowp["product"]?></a></th>
<?php } ?>  
                <th class="w3-right-align">
<?php
                $sql = "select id, color, hex from colors where id in (select col_id from product_colors where prod_id=?) order by color;";
                $rs_col = $conn->execute_query($sql, [$rowp["id"]]);
                if ($rs_col->num_rows > 0) {
                    while($rowcol = $rs_col->fetch_assoc()) {
?>
                    <span class="w3-tag w3-small" style="background-color: <?=$rowcol["hex"]?>"><?=$rowcol["color"]?></span>
<?php
                    }
                }
?>                    
                </th>
<?php if (isset($_SESSION["loggedin"]) && $_SESSION["uid"] == "0") { ?>
                <th><a href="action/do_remove_product.php?pid=<?=$rowp["id"]?>">remove</a></th>
<? } ?>
            </tr>
<?php
            }
        }
?>
        </table>
    </div>
<?php
    }
}
?>

    <!-- Footer -->
    <?php include "include/footer.php"; ?>

</body>
</html>

<?php
// close connection
$conn->close();
?>