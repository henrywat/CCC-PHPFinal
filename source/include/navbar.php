    <div class="w3-top  w3-center w3-dark-grey" id="topBar">
        <div class="w3-bar" id="navbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
                <i class="fa fa-bars"></i>
            </a>
            <a href="index.php" class="w3-bar-item w3-button w3-hover-red w3-text-sand"><i class="fa fa-home"> HOME</i></a>
            <a href="collections.php" class="w3-bar-item w3-button w3-hide-small w3-hover-red w3-text-sand"><i class="fa fa-book"></i> COLLECTIONS</a>
<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] && $_SESSION["uid"] == "0") { ?>
<?php } else { ?>
            <a href="cart.php" class="w3-bar-item w3-button w3-hide-small w3-hover-red w3-text-sand"><i class="fa fa-shopping-cart"></i> CART</a>
<?php } ?>
            <a href="orders.php" class="w3-bar-item w3-button w3-hide-small w3-hover-red w3-text-sand"><i class="fa fa-file-text"></i> ORDERS</a>
<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
?>
            <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-red w3-text-sand"><i class="fa fa-arrow-right"></i> LOGIN</a>
<?php
} else {
?>
            <a href="action/do_logout.php" class="w3-bar-item w3-button w3-hide-small w3-hover-red w3-text-sand"><i class="fa fa-arrow-left"></i> LOGOUT</a>
<?php
}
?>
        </div>

        <!-- navBar on phone screens -->
        <div id="navbarsmall" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
            <a href="collections.php" class="w3-bar-item w3-button" onclick="toggleFunction()"><i class="fa fa-book"></i> COLLECTIONS</a>
<?php if ($_SESSION["loggedin"] && $_SESSION["uid"] == "0") { ?>
<?php } else { ?>
            <a href="cart.php" class="w3-bar-item w3-button" onclick="toggleFunction()"><i class="fa fa-shopping-cart"></i> CART</a>
<?php } ?>
            <a href="orders.php" class="w3-bar-item w3-button" onclick="toggleFunction()"><i class="fa fa-file-text"></i> ORDERS</a>
            <?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
?>
            <a href="login.php" class="w3-bar-item w3-button"><i class="fa fa-arrow-right"></i> LOGIN</a>
<?php
} else {
?>
            <a href="action/do_logout.php" class="w3-bar-item w3-button"><i class="fa fa-arrow-left"></i> LOGOUT</a>
<?php
}
?>
        </div>
    </div>
    