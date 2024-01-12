<?php include "../include/db.php"; ?>
<?php
$uid = $_SESSION["uid"];
$total = $_SESSION["total"];
$now = new DateTime();
$full_name = $_SESSION["full_name"];
$phone = $_SESSION["phone"];
$address = $_SESSION["address"];

$sql = "insert into ecom.orders (user_id, place_time, total_amount, full_name, phone, address) values (?, ?, ?, ?, ?, ?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $uid, $now->format('Y-m-d H:i:s'), $total, $full_name, $phone, $address);

if ($stmt->execute()) {
    $order_id = $conn->insert_id;
    foreach($_SESSION["cart_item"] as $cart_key=>$item){
        $sql = "insert into ecom.order_items (order_id, product_id, color_id, quantity, unit_price) values (?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $order_id, $item["pid"], $item["cid"], $item["qty"], $item["price"]);
        $stmt->execute();
    }
    unset($_SESSION["cart_item"]); // empty cart
    $conn->close();
    header("location: ../orders.php");
    exit();
} else {
    //header("location: ../checkout.php");
    //exit();
}

$conn->close();
?>
