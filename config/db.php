<?php
$username = 'root';
$password = '';
$host = 'localhost';
$database = 'san3y';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");
?>