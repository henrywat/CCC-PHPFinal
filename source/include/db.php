<?
session_start();
//date.timezone = "America/Vancouver";
$servername = "localhost";
$username = "root";
$password = "xxxxxxxx";
$socket = "/var/run/mariadb10.sock";
$dbname = "ecom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, null, $socket);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
