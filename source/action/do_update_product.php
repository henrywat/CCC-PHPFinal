<?php include '../include/db.php'; ?>
<?
$pid = $_POST["pid"];
$prod = trim($_POST["prod"]);
$desc = trim($_POST["desc"]);
$price = $_POST["price"];
$col = $_POST["col"];
$pimg = $_FILES["pimg"]["name"];

// update product
$sql = "update ecom.products set product=?, description=?, price=? where id=?;";
$conn->execute_query($sql, [$prod, $desc, $price, $pid]);

// update product colors
$sql = "delete from product_colors where prod_id=?;";
$conn->execute_query($sql, [$pid]);
foreach ($col as $c) {
    $sql = "insert into product_colors (prod_id, col_id) values (?, ?);";
    $conn->execute_query($sql, [$pid, $c]);
}

// update image
if ($pimg != "") {
    $target_dir = "../img/prod/";
    $imageFileType = strtolower(pathinfo($_FILES["pimg"]["name"],PATHINFO_EXTENSION));
    $target_file = $target_dir . $pid . "." . $imageFileType;
    $temp = $pid . "." . $imageFileType;
    $sql = "update ecom.products set image=? where id=?;";
    $conn->execute_query($sql, [$temp, $pid]);

    if (file_exists($target_file)) {
        unlink($target_file);
    }
            
    move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
}

// close connection
$conn->close();

header("location: ../collections.php?pid=".$pid);
exit();
?>