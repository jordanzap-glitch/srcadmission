<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "admission_db";
$port = 3306;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

