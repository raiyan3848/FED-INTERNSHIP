<?php
include_once("db_connection.php");

// Get username and password from form
$usertype = $_POST['userType'];
$username = $_POST['signupName']; // Sanitize username