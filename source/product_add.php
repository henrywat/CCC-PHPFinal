<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "include/head.php"; ?>
<body>

    <!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

<?php
// product details
?>

    <!-- Hero -->
    <div class="pagetitle w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;PRODUCT ADD&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div> 
    </div>

    <!-- PRODUCT DETAIL -->
    <div class="w3-content w3-container w3-padding-64">
    <form action="action/do_add_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cid" value="<?=$cid?>">
        <label class="w3-text-blue"><b>Category: </b></label>
        <select name="cid" required>
            <option value="" disabled selected>-- Category --</option>
<?php
$sql = "select id, category from ecom.categories order by category;";
$rs_cat = $conn->query($sql);
if ($rs_cat->num_rows > 0) {
    while($rowcat = $rs_cat->fetch_assoc()) {
?>
            <option value="<?=$rowcat["id"]?>"><?=$rowcat["category"]?></option>
<?php
    }
}
?>
        <label class="w3-text-blue"><b>Product Name: </b></label><input class="w3-input w3-border" type="text" name="prod" value="" required placeholder="Product Name">
        <label class="w3-text-blue"><b>Product Image: </b></label><input type="file" name="pimg" id="pimg" required><br>
        <label class="w3-text-blue"><b>Description: </b></label><textarea class="w3-input w3-border" name="desc" rows="5" required placeholder="Product Description"></textarea>
        <label class="w3-text-blue">Colors: </label><br>
        <?php
// get available colors
$sql = "select id, color, hex from ecom.colors order by color;";
$rs_col = $conn->query($sql);
if ($rs_col->num_rows > 0) {
    $checked = false;
    while($rowcol = $rs_col->fetch_assoc()) {
            echo "<input type=\"checkbox\" name=\"col[]\" value=\"".$rowcol["id"]."\" class=\"w3-check\" ";
            if (!$checked) echo "checked";
            echo ">&nbsp;&nbsp;<span class=\"w3-tag w3-small w3-round\" style=\"background-color: ".$rowcol["hex"]."\">".$rowcol["color"]."</span>";
            echo "<br>";
            $checked = true;
    }
}
?>
        <label class="w3-text-blue"><b>Price (each): </b></label>
        <input class="w3-input w3-border" type="number" step="0.01" name="price" value="" required placeholder="999.99">
        <div class="w3-col w3-right-align">
            <button class="w3-button w3-round-large w3-sand w3-hover-brown" type="submit">Add</button>
        </div>
    </form>
    </div>

    <!-- Footer -->
    <?php include "include/footer.php"; ?>

</body>
</html>

<?php
// close connection
$conn->close();
?>

