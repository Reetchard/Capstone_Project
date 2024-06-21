<?php
$servername = "localhost"; //  server name
$username = "username"; //  database username
$password = "password"; // database password
$dbname = "your_database"; // database name

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
