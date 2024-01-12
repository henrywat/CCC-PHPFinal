<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
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
    <form action="action/do_update_product.php" method="post"  enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?=$rowp["id"]?>">
        <label class="w3-text-blue"><b>Product Name: </b></label><input class="w3-input w3-border" type="text" name="prod" value="<?=$rowp["product"]?>" required>

        <div class="w3-row">
            <!-- product image -->
            <div class="w3-third w3-container">
            <img class="aboutimg1" src="img/prod/<?=$rowp["image"]?>" alt="<?=$rowp["product"]?>" title="<?=$rowp["product"]?>">
            <input type="file" name="pimg" id="pimg"><br>*optinal
            </div>

            <!-- product description -->
            <div class="w3-rest w3-container">
                <div class="w3-col w3-content">
                    <label class="w3-text-blue"><b>Description: </b></label><textarea class="w3-input w3-border" name="desc" rows="5" required><?=$rowp["description"]?></textarea>
                </div>
                <div class="w3-col w3-xlarge w3-left-align">
                    <label class="w3-text-blue">Colors: </label><br>
                    <!--select name="col" size="10" multiple-->
<?php
    // get product selected colors' id
    $pcolors = [];
    $sql = "select id from colors where id in (select col_id from product_colors where prod_id=?);";
    $rs_pcol = $conn->execute_query($sql, [$rowp["id"]]);
    if ($rs_pcol->num_rows > 0) {
        while($rowcol = $rs_pcol->fetch_assoc()) {
            array_push($pcolors, $rowcol["id"]    );
        }
    }

    // get available colors
    $sql = "select id, color, hex from ecom.colors order by color;";
    $rs_col = $conn->query($sql);
    if ($rs_col->num_rows > 0) {
        while($rowcol = $rs_col->fetch_assoc()) {
            //echo "<option value=\"".$rowcol["id"]."\" class=\"w3-large\" style=\"color: ".$rowcol["hex"].";\" ";
            //if (in_array($rowcol["id"], $pcolors)) echo "selected";
            //echo ">".$rowcol["color"]."</option>\"";
            echo "<input type=\"checkbox\" name=\"col[]\" value=\"".$rowcol["id"]."\" class=\"w3-check\" ";
            if (in_array($rowcol["id"], $pcolors)) echo "checked";
            echo ">&nbsp;&nbsp;<span class=\"w3-tag w3-small w3-round\" style=\"background-color: ".$rowcol["hex"]."\">".$rowcol["color"]."</span>";
            echo "<br>";

        }
    }
?>
                    <!--/select-->

                </div>
                <div class="w3-col w3-xlarge w3-left-align">
                    <label class="w3-text-blue"><b>Price (each): </b></label>
                    <input class="w3-input w3-border" type="number" step="0.01" name="price" value="<?=$rowp["price"]?>" width="10" required>
                </div>
                <div class="w3-col w3-right-align">
                    <button class="w3-button w3-round-large w3-sand w3-hover-brown" type="submit">Update</button>
                </div>

            </div>

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

