<?php include 'include/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!-- HTML header -->
<?php include "include/head.php"; ?>
<body>

    <!-- Navbar (sit on top) -->
    <?php include "include/navbar.php"; ?>

    <!-- Hero -->
    <div class="heroimg w3-display-container w3-opacity-min">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">&nbsp;&nbsp;&nbsp;&nbsp;Nippon Paint&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </div>
    </div>
    
    <!-- About -->
    <div class="w3-content w3-container w3-padding-64">
        <h3 class="w3-center w3-text-blue">Nippon Paint</h3>
        <p>Nippon Paint is the largest paint manufacturer in Asia, spanning over a century of history.
            It is owned by the Nipsea Group in Singapore. Over the years, Nippon Paint has developed as the world’s leading international paint and coating brand.</p>
        <p>The company has always adhered to the three main principles “INNOVATION, SERVICE, LEADERSHIP”, and is committed to achieving harmony between human, nature and society; looking forward to the future, it can be better and better.</p>
        <p>Established since 1970, Nippon Paint (H.K.) Co., Ltd. has a team of experienced sales and marketing staffs. Over the years, the company has secured a wide range of projects comprising private residential apartments, commercial buildings, heavy duty structural steel work, public housing estates and public works.</p>
        <p>In 2019, Nippon Paint Holdings Co., Ltd. has acquired DGL, a leading marketer and manufacturer of paint & coating products in Australia and New Zealand. Nippon Paint Hong Kong jointly develop and promote with its leading brand, Selleys in Decorative Coatings, Architectural Coatings, Aerosol Paints, Automotive Refinishing, and Selleys’ products such as all types of adhesives, sealants, coating accessories, etc. Nippon Paint Group commits to develop diversified products to meet different needs of customers.</p>

        <p class="w3-large w3-center w3-padding-16 w3-text-blue">Most Popular Items:</p>
        <ol>
<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["uid"] == "0") {
    for ($i = 1; $i < 6; $i++) {
?>
        

                <form action="action/do_update_popular.php" method="post" id="p<?=$i?>">
                <li>
                    <select name="<?=$i?>" onchange="document.getElementById('p<?=$i?>').submit();">
<?php
        $sql = "select id, product, popular from ecom.products order by product;";
        $rs_popular = $conn->query($sql);
        if ($rs_popular->num_rows > 0) {
            while($row = $rs_popular->fetch_assoc()) {
?>
                        <option value="<?=$row["id"]?>" <?php if ($row["popular"] == $i) { echo "selected"; } ?>><?=$row["product"]?></option>
<?php       }
        }
?>
                    </select>
                    </li>
                </form>


<?php
    }
} else {
    $sql = "select id, product from ecom.products where popular is not null order by popular limit 5;";
    $rs_popular = $conn->query($sql);
    if ($rs_popular->num_rows > 0) {
        //echo "        <ol>";
        while($row = $rs_popular->fetch_assoc()) {
?>
            <li><p class="w3-large"><a href="product.php?pid=<?=$row["id"]?>"><?=$row["product"]?></a>
<?php
            $sql = "select id, color, hex from colors where id in (select col_id from product_colors where prod_id=?);";
            $rs_col = $conn->execute_query($sql, [$row["id"]]);
            if ($rs_col->num_rows > 0) {
                echo "<br>";
                while($rowc = $rs_col->fetch_assoc()) {
?>
                <span class="w3-tag w3-small" style="background-color: <?=$rowc["hex"]?>"><?=$rowc["color"]?></span>
<?php
                }
            }
?>
                </p>
            </li>
<?php
        }
        //echo "        </ol>";

    }
}
?>
        </ol>
    </div>

    <!-- statistic -->
    <div class="w3-row w3-center w3-dark-grey w3-padding-16">
        <div class="w3-quarter w3-section">
            <span class="w3-xlarge">17%</span><br>Indigo
        </div>
        <div class="w3-quarter w3-section">
            <span class="w3-xlarge">21+</span><br>Teal
        </div>
        <div class="w3-quarter w3-section">
            <span class="w3-xlarge">8%</span><br>Purple
        </div>
        <div class="w3-quarter w3-section">
            <span class="w3-xlarge">40%</span><br>white
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