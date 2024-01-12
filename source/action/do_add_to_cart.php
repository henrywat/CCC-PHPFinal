<?php include "../include/db.php"; ?>
<?php
// get parameter id from URL
$pid = $_POST["pid"];
$col = $_POST["col"];
$qty = $_POST["qty"];
$cart_key = $pid.$col; // unique key for cart item

if (!isset($qty) || !isset($col)) {
  header("location: ../product.php?pid=".$pid);
  exit();
}

// get product detail from database
$sql = "select product, price from products where id=?;";
$rs_p = $conn->execute_query($sql, [$pid]);
$row_p = $rs_p->fetch_assoc();

// get color
$sql = "select color, hex from colors where id=?;";
$rs_c = $conn->execute_query($sql, [$col]);
$row_c = $rs_c->fetch_assoc();

// create the item array
$itemArray = array($cart_key=>array("pid"=>$pid, "product"=>$row_p["product"], "price"=>$row_p["price"], "cid"=>$col, "color"=>$row_c["color"], "hex"=>$row_c["hex"], "qty"=>$qty));

// add or merge item to session array
if(isset($_SESSION["cart_item"])) {
  if(in_array($cart_key,array_keys($_SESSION["cart_item"]))) {
    $_SESSION["cart_item"][$cart_key]["qty"] += $qty;
  } else {
    $_SESSION["cart_item"] += $itemArray;
  }
} else {
  $_SESSION["cart_item"] = $itemArray;
}
$conn->close();
header("location: ../cart.php");
exit();
?>
