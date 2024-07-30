<?php
include_once("db_connection.php");

$sql = " TRUNCATE table bill ";
$result = mysqli_query($conn, $sql);

header("Location: redirect_homepage.html");
?>