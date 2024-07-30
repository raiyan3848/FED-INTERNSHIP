<?php

// Collect product details from the form
$product_name = $_POST['productName'];
$product_image = $_POST['productImage'];
$product_price = $_POST['productPrice'];

$product = [
    
    'productName' => $product_name,
    'productImage' => $product_image,
    'productPrice' => $product_price

// Add more products as needed
];

function generateProductCard($product) {
return '
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="' . $product['productImage'] . '" class="card-img-top" alt="' . $product['productName'] . '">
            <div class="card-body">
                <h5 class="card-title">$'. $product['productPrice'] . '</h5>
                <p class="card-text">' . $product['productName'] . '</p>
            </div>
        </div>
    </div>
</div>';
}

// Path to your original HTML file
$htmlFilePath = 'cart.php';

// Open the original HTML file
$htmlContent = file_get_contents($htmlFilePath);

// Find the position to insert new product cards
$pos = strpos($htmlContent, '<div class="golu">');

if ($pos !== false) {
// Move the pointer to the position after '<div class="row">'
$pos += strlen('<div class="golu">');


$productCards='';

$productCards .= generateProductCard($product);

$htmlContent = substr_replace($htmlContent, $productCards, $pos, 0);

file_put_contents($htmlFilePath, $htmlContent);



header("Location: homepage.php");

} else {
echo 'Error: <div class="row"> not found in the HTML file.';
}
?>
