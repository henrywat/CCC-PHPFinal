<?php include "../include/db.php"; ?>
<?php
// get parameter from post
$oid = $_POST["oid"];
$status = $_POST["status"];

// update status
$sql = "update ecom.orders set status=? where id=?;";
$conn->execute_query($sql, [$status, $oid]);

$conn->close();
header("location: ../orders.php");
exit();
?>
