<?php
// Include database connection code
include 'db_connection.php';
// Assuming you have a database connection established

// Retrieve the selected games array and username sent by the AJAX request
$selectedGames = $_POST['games'];
$username = $_POST['username'];

// Loop through the selected games array and insert each game into the database
foreach ($selectedGames as $game) {
    $gameName = $game['name'];
    $gamePrice = $game['price'];

    // Escape special characters to prevent SQL injection
    $gameName = mysqli_real_escape_string($conn, $gameName);
    $gamePrice = mysqli_real_escape_string($conn, $gamePrice);
    $username = mysqli_real_escape_string($conn, $username);

    // Perform SQL INSERT operation to insert game into database
    $sql = "INSERT INTO bill (username, product_name, price) VALUES ('$username', '$gameName', $gamePrice)";
    $salesql= "INSERT INTO sales (username, product_name, price) VALUES ('$username', '$gameName', $gamePrice)";

    mysqli_query($conn, $salesql);

    if (mysqli_query($conn, $sql)) {
        echo "Game '$gameName' stored successfully!<br>";
        
    } else {
        echo "Error storing game '$gameName': " . mysqli_error($conn) . "<br>";
    }
}

// Close database connection
mysqli_close($conn);
?>

