<?php include "../include/db.php"; ?>
<?php
// get parameter id from URL
$full_name = $_POST["full_name"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$credit_card = $_POST["credit_card"];

$_SESSION["full_name"] = $full_name;
$_SESSION["phone"] = $phone;
$_SESSION["address"] = $address;

// get product detail from database
$sql = "update ecom.users set full_name=?, phone=?, address=?, credit_card=? where id=?;";
$stmt = $conn->prepare($sql);

$stmt->bind_param("sssss", $full_name, $phone, $address, $credit_card, $_SESSION["uid"]);
if ($stmt->execute()) {
    $conn->close();
    header("location: ../place_order.php");
    exit();
} else {
    //header("location: ../checkout.php");
    //exit();
}

$conn->close();
?>
