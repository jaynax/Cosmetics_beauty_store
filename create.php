<?php
// Include your database configuration file
require 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $product = $_POST['product'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $total_amount = $_POST['total_amount']; // Corrected the variable name

    // Validate form data (optional)
    if (empty($fname) || empty($lname) || empty($product) || empty($date) || empty($qty) || empty($price) || empty($total_amount)) {
        // Handle validation errors
     
    } else {
        // Convert price, quantity, and total amount to numeric values
        $qty = intval($qty);
        $price = floatval($price);
        $total_amount = floatval($total_amount);

        // Prepare SQL statement to insert data into the database
        $sqlquery = "INSERT INTO orders (fname, lname, product, date, qty, price, total_amount) VALUES ('$fname', '$lname', '$product', '$date', '$qty', '$price', '$total_amount')";

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
</head>
<body>
     <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(img/beauty.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <div class="container" style="padding: 100px;">
        <div class="row d-flex justify-content-center">
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
                            <label for="product">Product</label>
                            <select id="product" name="product" class="form-control" required>
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
                            <input type="text" name="qty" id="qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control" readonly>
                        </div>
                        <center>
                            <button type="submit" class="mt-4 btn btn-success">PROCEED</button>
                            <a type="txt/css" class="mt-4 btn btn-primary" href="home.php">BACK</a>
                        </center>
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

        // Event listener for input changes
        document.getElementById('qty').addEventListener('input', calculateTotal);
        document.getElementById('price').addEventListener('input', calculateTotal);
    </script>
</body>
</html>
