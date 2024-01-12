<?php include '../include/db.php'; ?>
<?php
// make sure this is a POST request from this site
if ($_SERVER["REQUEST_METHOD"] != "POST" && strpos($_SERVER['REQUEST_URI'], "hwts") !== false) {
    header('Location: ../index.php');
    exit();
}


if (!isset($_SESSION["login_redirect"])) {
    $_SESSION["login_redirect"] = "orders.php";
}
// get user name and password from form
$u = trim($_POST["n"]);
$p = trim($_POST["p"]);

// get user name and password from database
$sql = "select id, name from users where name=? and password=?;";
$result = $conn->execute_query($sql, [$u, $p]);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION["uid"] = $row["id"];
        $_SESSION["uname"] = $row["name"];
        $_SESSION["loggedin"] = true;
        $conn->close();
        header("location: ../".$_SESSION["login_redirect"]);
        exit();
    }
} else {
    $_SESSION["loggedin"] = false;
    $conn->close();
    header('Location: ../login.php?e=1');
    exit();
}

// close connection
$conn->close();
?>