<?php
// Source HTML file
$sourceFile = "empty_cart.php"; // Change this to the path of your source HTML file

// Destination HTML file
$destinationFile = "cart.php"; // Change this to the path of your destination HTML file

// Read the content of the source HTML file
$sourceContent = file_get_contents($sourceFile);

// Write the content of the source HTML file to the destination HTML file
file_put_contents($destinationFile, $sourceContent);

header("Location: cart.php");
?>
