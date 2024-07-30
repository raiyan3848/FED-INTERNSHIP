function addProduct() {
    // Collect product details from the form
    var productName = document.getElementById('productName').value;
    var productDescription = document.getElementById('productDescription').value;
    var productImage = document.getElementById('productImage').value;
    var productPrice = document.getElementById('productPrice').value;
    var sellerName = document.getElementById('sellerName').value;
    var sellerEmail = document.getElementById('sellerEmail').value;
    var sellerPhone = document.getElementById('sellerPhone').value;

    // Create product card dynamically
    var cardDiv = document.createElement('div');
    cardDiv.className = 'col-md-4';
    cardDiv.innerHTML = '<div class="card"><img src="' + productImage + '" class="card-img-top" alt="' + productName + '"><div class="card-body"><h5 class="card-title">' + productName + '</h5><p class="card-text">' + productDescription + '</p><button class="btn btn-primary btn-carts">Add to Cart</button></div></div>';
    document.querySelector('.row').appendChild(cardDiv);

    // Optionally, you can send the product details to the server via AJAX for processing
    // var formData = new FormData(document.getElementById('addProductForm'));
    // var xhr = new XMLHttpRequest();
    // xhr.open('POST', 'process_product.php', true);
    // xhr.onload = function() {
    //     if (xhr.status === 200) {
    //         console.log('Product added successfully.');
    //     } else {
    //         console.error('Error adding product:', xhr.statusText);
    //     }
    // };
    // xhr.onerror = function() {
    //     console.error('Error adding product:', xhr.statusText);
    // };
    // xhr.send(formData);
}
