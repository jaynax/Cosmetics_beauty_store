<?php
include 'config.php';

// Initialize variables
$date_arrival = date('Y-m-d', strtotime('+7 days')); // Set default arrival date to 7 days from today
$total_payment = 0; // Default total payment

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $orders_id = $_POST['orders_id'];
    $quantity = $_POST['quantity'];

    // Fetch order details based on orders_id
    $sql = "SELECT * FROM orders WHERE id = '$orders_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = floatval($row['price']); // Convert price to float

        // Calculate total payment based on quantity and price
        $total_payment = $quantity * $price;

        // Insert order information into order_info table
        $sql_insert = "INSERT INTO order_info (customer_id, orders_id, quantity, date_arrival, total_payment)
                       VALUES ('$customer_id', '$orders_id', '$quantity', '$date_arrival', '$total_payment')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "Order information added successfully.";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } else {
        echo "Order not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Add Order Information</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="customer_id">Customer ID:</label>
        <input type="text" id="customer_id" name="customer_id" required><br>

        <label for="orders_id">Order ID:</label>
        <input type="text" id="orders_id" name="orders_id" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br>

        <label for="date_arrival">Date of Arrival:</label>
        <input type="text" id="date_arrival" name="date_arrival" value="<?php echo $date_arrival; ?>" disabled><br>

        <label for="total_payment">Total Payment (PHP):</label>
        <input type="text" id="total_payment" name="total_payment" value="<?php echo number_format($total_payment, 2); ?>" disabled><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
