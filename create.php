<?php
// Include your database configuration file
require 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $product = $_POST['product'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $total_amount = $_POST['total_amount'];

    // Validate form data (optional)
    if (empty($fname) || empty($lname) || empty($address) || empty($phone_num) || empty($product) || empty($date) || empty($qty) || empty($price) || empty($total_amount)) {
        // Handle validation errors
        echo "All fields are required.";
    } else {
        // Convert price, quantity, and total amount to numeric values
        $qty = intval($qty);
        $price = floatval($price);
        $total_amount = floatval($total_amount);

        // Calculate product arrival date
        $deliveryDays = 7; // Change this to your desired delivery duration
        $product_arrival = date('Y-m-d', strtotime($date . ' + ' . $deliveryDays . ' days'));

        // Prepare SQL statement to insert data into the database
        $sqlquery = "INSERT INTO product (fname, lname, address, phone_num, product, date, qty, price, total_amount, product_arrival) VALUES ('$fname', '$lname','$address', '$phone_num', '$product', '$date', '$qty', '$price', '$total_amount', '$product_arrival')";

        // Execute the SQL query and redirect
        if (mysqli_query($conn, $sqlquery)) {
            echo "<script>alert('Order Successfully.'); window.location.href='home.php';</script>";
        } else {
            // Error occurred while inserting data
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }

        // Close the database connection (optional)
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>COSMETICS BEAUTY STORE</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(img/beauty.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .container {
            padding: 100px;
        }
        .card {
            background-color: #f9f9f9;
            border-radius: 10px;
        }
        .card-title {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card p-4">
                    <div class="card-title"><h1>Cosmetics Beauty Store</h1></div>
                    <form method="POST" id="orderForm">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_num">Phone Number</label>
                            <input type="number" name="phone_num" id="phone_num" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="product">Product</label>
                            <select id="product" name="product" class="form-control" required>
                                <option value="">Select Product</option>
                                <option value="Set Fit Me 2 In 1 Face Powder & Liquid Foundation Xop Cosmetics Ph">Set Fit Me 2 In 1 Face Powder & Liquid Foundation Xop Cosmetics Ph</option>
                                <option value="12pcs Waterproof Liquid Matte Lipstick Set Long Lasting Makeup Lip Gloss Beauty√">12pcs Waterproof Liquid Matte Lipstick Set Long Lasting Makeup Lip Gloss Beauty√</option>
                                <option value="24Pc Makeup Set Kit for Women Makeup Gift Lip Gloss Concealer Eyeshadow Palette">24Pc Makeup Set Kit for Women Makeup Gift Lip Gloss Concealer Eyeshadow Palette</option>
                                <option value="Maybelline New York Sky High Mascara">Maybelline New York Sky High Mascara</option>
                                <option value="FLOWER Beauty Blush Bomb - Bubbly">FLOWER Beauty Blush Bomb - Bubbly</option>
                                <option value="Anti-Aging Cream">Anti-Aging Cream</option>
                                <option value="e.l.f Monochromatic Multi-Stick">e.l.f Monochromatic Multi-Stick</option>
                                <option value="MI FASHION 3D Shine Long Lasting Nail Polish Set Combo 15ml Each Pink, Wine Maroon, Tomato Red, Magenta (Pack of 4)">MI FASHION 3D Shine Long Lasting Nail Polish Set Combo 15ml Each Pink, Wine Maroon, Tomato Red, Magenta (Pack of 4)</option>
                                <option value="Lotus Herbals Safe Sun Invisible Matte Gel Sunscreen SPF 50 PA+++ , For Men & Women, Non-Greasy, Suitable for Oily Skin, 100g,Orange">Lotus Herbals Safe Sun Invisible Matte Gel Sunscreen SPF 50 PA+++ , For Men & Women, Non-Greasy, Suitable for Oily Skin, 100g,Orange</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date Ordered</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="qty">QTY</label>
                            <input type="number" name="qty" id="qty" class="form-control" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" min="0.01" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="product_arrival">Product Arrival</label>
                            <input type="date" name="product_arrival" id="product_arrival" class="form-control" readonly>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">PROCEED</button>
                            <a href="home.php" class="btn btn-primary">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        // Calculate total amount based on quantity and price
        function calculateTotal() {
            var qty = parseFloat(document.getElementById('qty').value);
            var price = parseFloat(document.getElementById('price').value);
            var total = qty * price;
            if (!isNaN(total)) {
                document.getElementById('total_amount').value = total.toFixed(2);
            } else {
                document.getElementById('total_amount').value = '';
            }
        }

        // Automatically set the product arrival date
        function setProductArrivalDate() {
            var orderDate = new Date(document.getElementById('date').value);
            var deliveryDays = 7; // Change this to your desired delivery duration
            var productArrivalDate = new Date(orderDate.getTime() + deliveryDays * 24 * 60 * 60 * 1000);
            var year = productArrivalDate.getFullYear();
            var month = productArrivalDate.getMonth() + 1;
            var day = productArrivalDate.getDate();
            var formattedDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
            document.getElementById('product_arrival').value = formattedDate;
        }

        // Event listener for input changes
        document.getElementById('qty').addEventListener('input', calculateTotal);
        document.getElementById('price').addEventListener('input', calculateTotal);

        // Call the function to set product arrival date initially
        setProductArrivalDate();
    </script>
</body>
</html>
