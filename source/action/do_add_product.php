<?php include '../include/db.php'; ?>
<?php
$cid = $_POST["cid"];
$prod = $_POST["prod"];
$desc = $_POST["desc"];
$price = $_POST["price"];
$col = $_POST["col"];
$pimg = "";

// insert product
$sql = "insert into ecom.products (cat_id, product, description, image, price) values (?, ?, ?, ?, ?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $cid, $prod, $desc, $pimg, $price);
if ($stmt->execute()) {
    $pid = $conn->insert_id;
    $target_dir = "../img/prod/";
    $imageFileType = strtolower(pathinfo($_FILES["pimg"]["name"],PATHINFO_EXTENSION));
    $target_file = $target_dir . $pid . "." . $imageFileType;

    // update product image
    $sql = "update ecom.products set image=? where id=?;";
    $stmt = $conn->prepare($sql);
    $temp = $pid . "." . $imageFileType;
    $stmt->bind_param("ss", $temp, $pid);
    $stmt->execute();

    // insert colors
    foreach ($col as $c) {
        $sql = "insert into ecom.product_colors (prod_id, col_id) values (?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $pid, $c);
        $stmt->execute();
    }

    // upload image
    move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
}

$conn->close();
header('Location: ../collections.php');
exit();
?>