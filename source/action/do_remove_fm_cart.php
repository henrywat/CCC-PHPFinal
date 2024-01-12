<?php
session_start();
unset($_SESSION["cart_item"][$_GET["ckey"]]);

header("location: ../cart.php");
exit();
?>
