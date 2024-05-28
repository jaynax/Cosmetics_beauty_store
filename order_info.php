<!DOCTYPE html>
<html>
<head>
    <title>Product Information</title>
    <style>
        body{
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(img/22.jpg);
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
        /* Add this style for the background color of data cells */
        td {
            background-color: lightpink; /* Set the background color for data cells */
        }
    </style>
</head>
<body>
<center>
<h2>Order History Information</h2>
</center>
<table>
    <tr>
        <th>Customer ID</th>
        <th>PRODUCT ID</th>
        <th>Quantity</th>
        <th>Date Order</th>
        <th>Date Arrival</th>
        <th>Price</th>
        <th>Total Amount</th>
    </tr>
    
    <?php
    // Include your database configuration file
    require 'config.php';

    // Fetch products from the database
    $sql = "SELECT * FROM order_info";
    $result = mysqli_query($conn, $sql);

    // Check if there are any products
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["customer_id"] . "</td>";
            echo "<td>" . $row["orders_id"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["date_ordered"] . "</td>";
            echo "<td>" . $row["date_arrival"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["total_payment"] . "</td>";
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
