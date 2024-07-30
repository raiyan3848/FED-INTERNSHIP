<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Steam Unlocked</title>
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
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
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
    <!-- Product cards -->
    <div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="https://www.global-esports.news/wp-content/uploads/2022/09/Assassins-Creed-Mirage1.jpg" class="card-img-top" alt="Assasins creed mirage">
            <div class="card-body">
                <h5 class="card-title">$25</h5>
                <p class="card-text">Assasins creed mirage</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="Assasins creed mirage">
                    <input type="hidden" name="productPrice" value="25">
                    <input type="hidden" name="productImage" value="https://www.global-esports.news/wp-content/uploads/2022/09/Assassins-Creed-Mirage1.jpg">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="https://media.contentapi.ea.com/content/dam/fifa/en-us/images-migrated/2013/06/fifa-14-global-cover-artheaderimage_00.png.adapt.crop191x100.628p.png" class="card-img-top" alt="FIFA 2014">
            <div class="card-body">
                <h5 class="card-title">$20</h5>
                <p class="card-text">FIFA 2014</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="FIFA 2014">
                    <input type="hidden" name="productPrice" value="20">
                    <input type="hidden" name="productImage" value="https://media.contentapi.ea.com/content/dam/fifa/en-us/images-migrated/2013/06/fifa-14-global-cover-artheaderimage_00.png.adapt.crop191x100.628p.png">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="https://staticctf.akamaized.net/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/Bn213V7aySLmjGwfQkSMy/bffebc6e9a19f3524a306d89cbc3b0d4/fc6-page_meta-thumbnail.jpg" class="card-img-top" alt="Far Cry 6">
            <div class="card-body">
                <h5 class="card-title">$15</h5>
                <p class="card-text">Far Cry 6</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="Far Cry 6">
                    <input type="hidden" name="productPrice" value="15">
                    <input type="hidden" name="productImage" value="https://staticctf.akamaized.net/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/Bn213V7aySLmjGwfQkSMy/bffebc6e9a19f3524a306d89cbc3b0d4/fc6-page_meta-thumbnail.jpg">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.u7r9XNHmR6B98HhaTNOKJQHaEK?rs=1&pid=ImgDetMain" class="card-img-top" alt="Gta 6">
            <div class="card-body">
                <h5 class="card-title">$50</h5>
                <p class="card-text">Gta 6</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="Gta 6">
                    <input type="hidden" name="productPrice" value="50">
                    <input type="hidden" name="productImage" value="https://th.bing.com/th/id/OIP.u7r9XNHmR6B98HhaTNOKJQHaEK?rs=1&pid=ImgDetMain">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.5IE_Y1yjG-puL269nxhcUAHaEK?rs=1&pid=ImgDetMain" class="card-img-top" alt="PUBG">
            <div class="card-body">
                <h5 class="card-title">$0</h5>
                <p class="card-text">PUBG</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="PUBG">
                    <input type="hidden" name="productPrice" value="0">
                    <input type="hidden" name="productImage" value="https://th.bing.com/th/id/OIP.5IE_Y1yjG-puL269nxhcUAHaEK?rs=1&pid=ImgDetMain">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="https://compass-ssl.xbox.com/assets/84/28/8428c630-0a52-42c3-8521-181ab70f1ccb.jpg?n=299441_GLP-Page-Hero-1084_1920x1080.jpg" class="card-img-top" alt="Battlefield">
            <div class="card-body">
                <h5 class="card-title">$9</h5>
                <p class="card-text">Battlefield</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="Battlefield">
                    <input type="hidden" name="productPrice" value="9">
                    <input type="hidden" name="productImage" value="https://compass-ssl.xbox.com/assets/84/28/8428c630-0a52-42c3-8521-181ab70f1ccb.jpg?n=299441_GLP-Page-Hero-1084_1920x1080.jpg">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.i4xg-AEhILtgDMKpOD3LqwAAAA?w=474&h=266&rs=1&pid=ImgDetMain" class="card-img-top" alt="Call of Duty MW3">
            <div class="card-body">
                <h5 class="card-title">$10</h5>
                <p class="card-text">Call of Duty MW3</p>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="productName" value="Call of Duty MW3">
                    <input type="hidden" name="productPrice" value="10">
                    <input type="hidden" name="productImage" value="https://th.bing.com/th/id/OIP.i4xg-AEhILtgDMKpOD3LqwAAAA?w=474&h=266&rs=1&pid=ImgDetMain">
                    <button type="submit" class="btn btn-primary btn-carts">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.querySelectorAll(".btn-carts").forEach(function(button) {
      button.addEventListener("click", function() {
        alert("Added to cart");
      });
    });
 </script>
</body>
</html>
