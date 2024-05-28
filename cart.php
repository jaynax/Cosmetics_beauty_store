<?php
session_start();

<<<<<<< HEAD
include 'config.php';

=======
>>>>>>> d362fed4d74955653d69e7a4463a46e1dbd8a8dd
// Function to remove item from cart by product ID
function removeFromCart($productId) {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $productId) {
                unset($_SESSION['cart'][$key]); // Remove item from cart
                break;
            }
        }
    }
}

// Process delete request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    removeFromCart($productId);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        /* CSS styles for the shopping cart page */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
<<<<<<< HEAD
            background: url('img/378483a28a563b9d5ab86019b09cbc87.jpg');
=======
            background-color: #f8f8f8;
>>>>>>> d362fed4d74955653d69e7a4463a46e1dbd8a8dd
        }
        header, nav {
            background-color: pink;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }
        .cart-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .cart-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        .cart-item img {
            max-width: 100px;
            vertical-align: middle;
            margin-right: 10px;
        }
        .cart-item .delete-form {
            margin-left: auto;
        }
        .buy-form {
            margin-top: 10px;
            text-align: center;
        }
        .buy-form button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
<<<<<<< HEAD
    <h1 style="color: black; font-family: cambria math, cambria, sans-serif;">Shopping Cart</h1>
</header>

<nav>
    <a href="home.php" style="color: white; font-family: cambria math, cambria, sans-serif;color: black;">Continue Shopping</a>
</nav>

<div class="cart-container">
    <h2 style="color: black; font-family: cambria math, cambria, sans-serif;">Your Cart</h2>

    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Fetch product details from the database for items in the cart
        $productIds = implode(',', array_map('intval', array_column($_SESSION['cart'], 'id')));
        $sql = "SELECT id, product, price, img FROM orders WHERE id IN ($productIds)";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='cart-item'>";
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['img']) . "' alt='{$row['product']}'>";
                echo "<p>Product ID: {$row['id']}</p>";
                echo "<h3>{$row['product']}</h3>";
                echo "<p>Price: {$row['price']}</p>";
                echo "<form class='delete-form' method='post'>";
                echo "<input type='hidden' name='product_id' value='{$row['id']}'>";
                echo "<button type='submit' name='delete'>Delete</button>";
                echo "</form>";
                echo "</div>";
            }

            // Display Buy button to proceed to create.php
            echo "<form class='buy-form' method='get' action='create.php'>";
            echo "<button type='submit'>Buy Items</button>";
            echo "</form>";
        } else {
            echo "<p>No products found in the cart.</p>";
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }

    mysqli_close($conn);
=======
    <h1>Shopping Cart</h1>
</header>

<nav>
    <a href="home.php">Continue Shopping</a>
</nav>

<div class="cart-container">
    <h2>Your Cart</h2>

    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            echo "<div class='cart-item'>";
            echo "<img src='img/beauty_1.jpg' alt='{$item['product']}'>";
            echo "<p>Product ID: {$item['id']}</p>";
            echo "<h3>{$item['product']}</h3>";
            echo "<p>Price: ₱{$item['price']}</p>";
            echo "<form class='delete-form' method='post'>";
            echo "<input type='hidden' name='product_id' value='{$item['id']}'>";
            echo "<button type='submit' name='delete'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }

        // Display Buy button to proceed to create.php
        echo "<form class='buy-form' method='get' action='create.php'>";
        echo "<button type='submit'>Buy Items</button>";
        echo "</form>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
>>>>>>> d362fed4d74955653d69e7a4463a46e1dbd8a8dd
    ?>
</div>

</body>
</html>
