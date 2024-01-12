<?php include "../include/db.php"; ?>
<?php

foreach($_POST as $p => $id) {
    // reset old product popular to null
    $sql = "update ecom.products set popular=null where popular=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $p);
    $stmt->execute();

    // update new product popular
    $sql = "update ecom.products set popular=? where id=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $p, $id);
    $stmt->execute();
}

$conn->close();
header("location: ../index.php");
exit();
?>
