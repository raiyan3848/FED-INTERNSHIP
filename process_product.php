<?php

// Collect product details from the form
$product_name = $_POST['productName'];
$product_description = $_POST['productDescription'];
$product_image = $_POST['productImage'];
$product_price = $_POST['productPrice'];

// Create an array to store product details

$product = [
    
        'productName' => $product_name,
        'productDescription' => $product_description,
        'productImage' => $product_image,
        'productPrice' => $product_price
    
    // Add more products as needed
];

function generateProductCard($product) {
    return '
    <div class="col-md-4">
        <div class="card">
            <img src="' . $product['productImage'] . '" class="card-img-top" alt="' . $product['productName'] . '">
            <div class="card-body">
                <h5 class="card-title">$'. $product['productPrice'] . '</h5>
                <p class="card-text">' . $product['productName'] . '</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="' . $product['productName'] . '">
                    <input type="hidden" name="productPrice" value="'. $product['productPrice'] .'">
                    <input type="hidden" name="productImage" value="' . $product['productImage'] . '">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>';
}

// Path to your original HTML file
$htmlFilePath = 'homepage.php';

// Open the original HTML file
$htmlContent = file_get_contents($htmlFilePath);

// Find the position to insert new product cards
$pos = strpos($htmlContent, '<div class="row">');

if ($pos !== false) {
    // Move the pointer to the position after '<div class="row">'
    $pos += strlen('<div class="row">');


$productCards='';

$productCards .= generateProductCard($product);

$htmlContent = substr_replace($htmlContent, $productCards, $pos, 0);

file_put_contents($htmlFilePath, $htmlContent);



header("Location: redirect_addproduct.html");

} else {
echo 'Error: <div class="row"> not found in the HTML file.';
}
?>
