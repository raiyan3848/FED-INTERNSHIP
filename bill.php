<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            text-align: center;
        }
        h1 {
            font-size: 30px;
            margin-bottom: 20px;
        }
        table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-price, .thank-you {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Receipt</h1>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to your database
            include_once("db_connection.php");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch data from your "bill" table
            $sql = "SELECT username, product_name, price FROM bill  WHERE username IN (SELECT name FROM final_users WHERE active = 1)";
            $result = $conn->query($sql);

            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "</tr>";
            }

            // Close the database connection
           
            ?>
        </tbody>
    </table>

    <?php
    // Connect to your database
    include_once("db_connection.php");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Calculate and output the total price
    $total_sql = "SELECT SUM(price) AS total_price FROM bill";
    $total_result = $conn->query($total_sql);
    $total_row = $total_result->fetch_assoc();
    $total_price = $total_row["total_price"];
    ?>
    <p class="total-price">Total Price: <?php echo $total_price; ?></p>
    <?php
    // Get the username from the final_users table
    $username_sql = "SELECT name FROM final_users WHERE active = 1";
    $username_result = $conn->query($username_sql);
    $username_row = $username_result->fetch_assoc();
    $username = $username_row["name"];
    ?>
    <p class="thank-you">Thank you, <?php echo $username; ?>, for buying!</p>
    <?php
    // Close the database connection
    $conn->close();
    ?>

    <button class="text-right">
        <a href="empty_sql.php" class="btn btn-primary" style= "width: 120px; padding-left: 12px; padding-right:12px;">Back to Home</a>
</button>
</body>
</html>
