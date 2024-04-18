<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetics Beauty Store</title>

    <link rel="stylesheet" href="Components/image.css">
    <link rel="stylesheet" href="Components/navbar.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            background-image: url('img/beauty.jpg'); /* Replace 'background-image.jpg' with your actual image file path */
            background-size: cover;
            background-repeat: no-repeat;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        .welcome-message {
            font-size: 24px;
            color: #333; /* Change the color to your preference */
        }

        .highlighted-word {
            font-size: 36px;
            color: #ff3366; /* Change the color to your preference */
            font-weight: bold;
        }

        .footer-slideshow-container {
            max-width: 100%;
            margin: auto;
        }

        .footer-mySlides {
            display: none;
            width: 100%;
        }

        .footer-img {
            width: 100%;
            height: auto;
        }

        .featured-products {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product {
            background-color: #fff;
            border: 5px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            text-align: center;
            width: 300px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">Cosmetics Beauty Store</div>
        <ul class="nav-links">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="auth/login.php">Login</a></li>
            <li><a href="auth/registration.php">Register</a></li>
        </ul>
    </nav>

    <section>
        <div class="welcome-message">
            <h1>Welcome to our <span class="highlighted-word">Cosmetics Beauty Store</span>!</h1>
            <h2>Discover a wide range of Beautiful cosmetics and beauty products.</h2>
        </div>

        <h1>Featured Products</h1>

        <div class="featured-products">

        <div class="product">
            <img src="img/beauty_1.jpg" alt="Product 1">
            <h3>
Set Fit Me 2 In 1 Face Powder & Liquid Foundation Xop Cosmetics Ph</h3>
            <p>$19.99</p>
            <a href="auth/login.php" style="  border: 2px solid black;">Add to Cart</a>
        </div>

        <div class="product">
            <img src="img/Lipstick.jpg" alt="Product 2">
            <h3>12pcs Waterproof Liquid Matte Lipstick Set Long Lasting Makeup Lip Gloss Beauty√</h3>
            <p>$29.99</p>
            <a href="auth/login.php" style="  border: 2px solid black;">Add to Cart</a>
        </div>

        <div class="product">
            <img src="img/makeup.jpg" alt="Product 3">
            <h3>24Pc Makeup Set Kit for Women Makeup Gift Lip Gloss Concealer Eyeshadow Palette</h3>
            <p>$24.99</p>
            <a href="auth/login.php" style="  border: 2px solid black;">Add to Cart</a>
        </div>
        <div class="product">
            <img src="img/eye.jpg" alt="Product 3">
            <h3>Maybelline New York Sky High Mascara
</h3>
            <p>$24.99</p>
            <a href="auth/login.php" style="  border: 2px solid black;">Add to Cart</a>
        </div>
        <div class="product">
            <img src="img/nail.jpg" alt="Product 3">
            <h3>MI FASHION 3D Shine Long Lasting Nail Polish Set Combo 15ml Each Pink, Wine Maroon, Tomato Red, Magenta (Pack of 4)
</h3>
            <p>$24.99</p>
            <a href="auth/login.php" style="  border: 2px solid black;">Add to Cart</a>
    </section>

</body>

</html>
