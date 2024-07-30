<?php

// Include database connection file
include_once("db_connection.php");

// Get username and password from form
$usertype = $_POST['userType'];
$username = $_POST['signupName']; // Sanitize username
$password = $_POST['signupPassword']; // Sanitize password



// Check user in the database
$sql = "SELECT * FROM final_users WHERE name = '$username' AND password = '$password' AND usertype = '$usertype' ";
$result = mysqli_query($conn, $sql);

// If user found, redirect to dashboard
if (mysqli_num_rows($result) == 1) {
    $sql_update = "UPDATE final_users SET active = 0";
    mysqli_query($conn, $sql_update);
    $sql_update_user = "UPDATE final_users SET active = 1 WHERE name = '$username' ";
    mysqli_query($conn, $sql_update_user);
    if($usertype=='buyer'){
        header("Location: redirect_homepage.html");
    }
    else{
        echo 'welcome seller . sell and make me rich not you!!!';
        sleep(2);
        header("Location: add_new_product.html");
    }
} else {
    echo "Invalid username or password.";
}

// Close database connection
mysqli_close($conn);
?>
