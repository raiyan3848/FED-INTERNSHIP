<?php
// Include database connection file
include_once("db_connection.php");

    // Get username, password, and user type from form
    $usertype = $_POST['userType'];
    $username = $_POST['signupName']; // Sanitize username
    $password = $_POST['signupPassword']; // Sanitize password


    $sql = "INSERT INTO final_users (usertype, name, password) VALUES ('$usertype', '$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        if ($usertype == 'buyer') {
            echo "User registered successfully as Buyer.";
        } else {
            echo "User registered successfully as Seller.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
// Close database connection
mysqli_close($conn);
?>
