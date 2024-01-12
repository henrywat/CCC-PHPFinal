<?php include '../include/db.php'; ?>
<?php
$pid = $_GET["pid"];

$sql = "select image from ecom.products where id=?;";
$rs_prod = $conn->execute_query($sql, [$pid]);
if ($rs_prod->num_rows > 0) $rowp = $rs_prod->fetch_assoc();

try {
    $file = fopen("../img/prod/".$rowp["image"],"w");
    unlink("../img/prod/".$rowp["image"]);
} catch (Exception $e) {
    //echo 'Caught exception: ',  $e->getMessage(), "\n";
    // do nothing
}


$sql = "delete from ecom.product_colors where prod_id=?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $pid);
$stmt->execute();

$sql = "delete from ecom.products where id=?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $pid);
$stmt->execute();


$conn->close();
header('Location: ../collections.php');
exit();
?>