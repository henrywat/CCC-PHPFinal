<?php

$servername = "localhost";
$username = "root";
$password = "P@ssw0rd";
$socket = "/var/run/mariadb10.sock";
$dbname = "ecom";

try {
    echo "init connection<br>";
    $conn = new mysqli($servername, $username, $password, $dbname, "3306", $socket); 
    echo "close connection<br>";
    $conn->close();
    } catch (Exception $e) {   
    print $e->getMessage();   
    exit();   
    }  

?>
Hello World!