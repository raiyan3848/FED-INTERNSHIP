<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Steam Unlocked</title>
  <!-- Include jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #000; /* Black background */
      color: #ff0000; /* Red text */
    }
    .container {
      margin-top: 50px;
    }
    .custom-navbar {
      background-color: #000; /* Black navbar */
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5); /* Shadow */
    }
    .navbar-nav {
      gap: 20px;
    }
    .navbar-brand {
      color: #ff0000 !important; /* Red navbar text */
      font-size: 24px;
      font-weight: bold;
      font-family: 'Reem Kufi Ink', sans-serif;
    }
    .navbar-nav .nav-link {
      color: #ff0000 !important; /* Red navbar links */
      font-size: 18px;
      font-weight: bold;
      margin-left: 20px;
    }
    .navbar-nav .nav-link:hover {
      color: #8b0000 !important; /* Dark red on hover */
    }
    .search-bar {
      width: 60%;
      margin-left: 30px;
      margin-right: 0;
    }
    .btn-search {
      background-color: #ff0000; /* Red button */
      border-color: #ff0000; /* Red border */
      color: white;
    }
    .btn-search:hover {
      background-color: #8b0000; /* Dark red button on hover */
      border-color: #8b0000; /* Dark red border on hover */
    }
    .card {
      background-color: #2c2c2c; /* Dark gray background */
      color: #ff0000; /* Red text */
      margin-bottom: 20px;
    }
    .card-img-top{
      width:auto;
      height:208px;
    }
    .card-title {
      color: #ff0000; /* Red card title */
    }
    .card-text {
      color: #ff0000; /* Red card text */
    }
    .btn-primary {
      background-color: #ff0000; /* Red button */
      border-color: #ff0000; /* Red border */
    }
    .btn-primary:hover {
      background-color: #8b0000; /* Dark red button on hover */
      border-color: #8b0000; /* Dark red border on hover */
    }
    .username {
      font-size: 18px;
      font-weight: bolder;
      margin-top: 27px;
      margin-right: 20px;
      color: #ff0000;
    }

    .text-right {
      font-size: 25px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <!-- Custom Navbar -->
  <nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
      <img src="img/GodLogo.png" alt="" width="90px" height="90px">
      <a class="navbar-brand" href="Main.html">Sheild!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Categories</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <?php
            // Include database connection file
            include_once("db_connection.php");

            // Query to select the name of the logged-in user
            $sql = "SELECT name FROM final_users WHERE active = 1";
            $result = mysqli_query($conn, $sql);

            // Check if there's a logged-in user
            if (mysqli_num_rows($result) == 1) {
                // Fetch the name of the logged-in user
                $row = mysqli_fetch_assoc($result);
                $logged_in_user = $row['name'];
            } else {
                $logged_in_user = "No logged-in user";
            }

            // Close database connection
            mysqli_close($conn);

            // Display the active username
            echo '<p class="username">' . $logged_in_user . '</p>';
            ?>
        </li>
          <li class="nav-item">
            <img src="img/profile.png" alt="" style="border-radius: 50%;" width="80px" height="80px">
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container">
        <div class="col-md-12">
            <!-- Display Total Cost -->
            <p class="text-right">Total Cost: <span id="totalCost">$0</span></p>
            <!-- Buy Button -->
            <p class="text-right"><button id="buy-product" class="btn btn-primary" style= "padding-left:20px; padding-right:20px;">Buy</button></p>
        </div>
  <div class="golu">
<div class="col-md-1">
    <p class="text-right">
        <a href="emptying_cart.php" class="btn btn-primary" style= "width: 120px; padding-left: 12px; padding-right:12px;">Empty Cart</a>
    </p>
</div>

  </div>
</div>

<!-- JavaScript to post cart products to buying_process.php -->
<script>
  jQuery.noConflict();
  jQuery(document).ready(function($) {
    $(document).ready(function() {
      $('#buy-product').click(function() {
        // Check if there are any product cards available
        if ($('.card').length > 0) {
          var selectedGames = [];
          $('.card').each(function() {
            var gameName = $(this).find('.card-text').text();
            var gamePrice = parseFloat($(this).find('.card-title').text().replace('$', ''));
            selectedGames.push({ name: gameName, price: gamePrice });
          });

          // Fetch the username
          var username = $('.username').text().trim();

          // Send selectedGames array and username to server using AJAX
          $.ajax({
            type: 'POST',
            url: 'buying_process.php',
            data: { games: selectedGames, username: username },
            success: function(response) {
              alert(response); // Show success message or handle response
              window.location.href = "bill.php";
            },

            error: function(xhr, status, error) {
              console.error(error); // Handle error
            }
          });
        } else {
          // If no product cards available, handle accordingly (e.g., show a message)
          alert("No products selected.");
        }
      });
    });
  });  
</script>

<!-- JavaScript to Calculate Total Cost -->
<script>
    // Function to calculate total cost
    function calculateTotalCost() {
        // Get all card titles (which contain the prices)
        const cardTitles = document.querySelectorAll('.card-title');
        let total = 0;
        
        // Loop through each card title
        cardTitles.forEach(function(cardTitle) {
            // Extract the price from the card title text and convert to number
            const price = parseFloat(cardTitle.textContent.replace('$', ''));
            
            // Add the price to the total
            total += price;
        });
        
        // Update the total cost display
        document.getElementById('totalCost').textContent = '$' + total.toFixed(2);
    }
    
    // Call the function initially to calculate total cost
    calculateTotalCost();
    
    // Add event listener to "Add to Cart" buttons to recalculate total cost when clicked
    const addToCartButtons = document.querySelectorAll('.btn-carts');
    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            calculateTotalCost();
        });
    });
</script>

  

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
