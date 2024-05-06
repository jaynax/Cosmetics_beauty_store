<?php
session_start();

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
            background-color: #f8f8f8;
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
    ?>
</div>

</body>
</html>
