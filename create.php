<?php
include 'config.php';

// Initialize variables
<<<<<<< HEAD
$customer_id = $orders_id = $quantity = $price = $total_payment = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $orders_id = $_POST['orders_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];


    // Validate inputs
    if (is_numeric($quantity) && is_numeric($price) && $quantity > 0 && $price > 0) {
        // Calculate total payment based on quantity and price
        $total_payment = $quantity * $price;

        // Calculate date of arrival (10 days from the current date)
        $date_arrival = date('Y-m-d', strtotime('+10 days'));

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO order_info (customer_id, orders_id, quantity, date_arrival, total_payment, price) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiisds", $customer_id, $orders_id, $quantity, $date_arrival, $total_payment, $price);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            $success_message = "Transaction successfully.";
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        $error_message = "Invalid input. Quantity and Price must be positive numbers.";
=======
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
>>>>>>> d362fed4d74955653d69e7a4463a46e1dbd8a8dd
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            background-image: url('img/22.jpg');
            background-size: cover;
            background-repeat: no-repeat;
=======
    <title>Add Order Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
>>>>>>> d362fed4d74955653d69e7a4463a46e1dbd8a8dd
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
<<<<<<< HEAD
            background-color: lightpink;
            padding: 20px;
            border-radius: 10px;
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
        input[readonly] {
            background-color: #e9e9e9;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2em;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
=======
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
>>>>>>> d362fed4d74955653d69e7a4463a46e1dbd8a8dd
        }
    </style>
</head>
<body>
<<<<<<< HEAD
    <center style="padding: 50px;">
        <h2 style="color: black;">ORDER FORM</h2>
        <form method="post" action="create.php">
            <label for="customer_id">Customer ID:</label>
            <input type="text" id="customer_id" name="customer_id" required><br>

            <label for="orders_id">Order ID:</label>
            <input type="text" id="orders_id" name="orders_id" required><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required oninput="calculateTotal()"><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required onchange="calculateTotal()"><br>

            <label for="total_payment">Total Payment (PHP):</label>
            <input type="text" id="total_payment" name="total_payment" readonly><br>
            <input type="submit" value="Buy">
            <button style="  padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer; "><a href="home.php">BACK</a></button>
        </form>
        <?php
        if (isset($success_message)) {
            echo "<div class='message success'>$success_message</div>";
        }
        if (isset($error_message)) {
            echo "<div class='message error'>$error_message</div>";
        }
        ?>
    </center>

    <script>
        function calculateTotal() {
            var price = parseFloat(document.getElementById('price').value);
            var quantity = parseInt(document.getElementById('quantity').value);
            if (!isNaN(price) && !isNaN(quantity) && quantity > 0) {
                var total_payment = price * quantity;
                document.getElementById('total_payment').value = total_payment.toFixed(2); // Round to 2 decimal places
            } else {
                document.getElementById('total_payment').value = '';
            }
        }
    </script>
=======
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
>>>>>>> d362fed4d74955653d69e7a4463a46e1dbd8a8dd
</body>
</html>
