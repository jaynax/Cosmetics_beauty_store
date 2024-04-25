<!DOCTYPE html>
<html>
<head>
    <title>Product Information</title>
    <style>
        body{
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(../img/beauty.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Product Information</h2>

<table>
    <tr>
        <th>Product ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
         <th>Phone Number</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Price</th>
        <th>Total Amount</th>
         <th>Arrival</th>
    </tr>
    
    <?php
    // Include your database configuration file
    require '../config.php';

    // Fetch products from the database
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);

    // Check if there are any products
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["fname"] . "</td>";
            echo "<td>" . $row["lname"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
             echo "<td>" . $row["phone_num"] . "</td>";
            echo "<td>" . $row["product"] . "</td>";
            echo "<td>" . $row["qty"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["total_amount"] . "</td>";
                echo "<td>" . $row["product_arrival"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No products found.</td></tr>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</table>

</body>
</html>
