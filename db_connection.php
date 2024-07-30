<?php
// Database connection details
$servername = "localhost";
        $username = "root";
        $password = "Saadtuf29@";
        $database = "golu";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
