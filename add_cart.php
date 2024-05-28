<?php
session_start();

// Check if the request method is GET and required parameters are set
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['product']) && isset($_GET['price'])) {
    // Retrieve product details from GET parameters
    $id = $_GET['id'];
    $product = $_GET['product'];
    $price = $_GET['price'];

    // Initialize the cart session variable if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product to the cart
    $_SESSION['cart'][] = array(
        'id' => $id,
        'product' => $product,
        'price' => $price
    );

    // Provide a success message (you can customize this output)
    echo "Product added to cart successfully.";

    // Redirect to cart.php after adding the product to the cart
    header("Location: cart.php");
    exit();
} else {
    // Handle invalid or incomplete requests
    echo "Invalid request. Please provide product details.";
}
?>
