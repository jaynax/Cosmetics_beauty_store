<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetics Beauty Store</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            background-color: pink;
            padding: 10px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }


        h1 {
            font-family: cambria math, cambria, sans-serif;
            color: : black;
            text-decoration: none;
        }

        .banner {
            background-image: url('img/378483a28a563b9d5ab86019b09cbc87.jpg'); /* Replace with your image URL */
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
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

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h1>Cosmetics Beauty Store</h1>
    </header>

    <nav>
        <a href="#" style="color: white; font-family: cambria math, cambria, sans-serif;">Home</a>
        
        <a href="order_info.php" style="color: white; font-family: cambria math, cambria, sans-serif;">Order History</a>
        <a href="cart.php" style="color: white; font-family: cambria math, cambria, sans-serif;">Cart</a>
        <a href="contact.php" style="color: white; font-family: cambria math, cambria, sans-serif;">Concern</a>
        <a href="index.php"style="color: white; font-family: cambria math, cambria, sans-serif;">Logout</a>
    </nav>

    <div class="banner">
        <h1 style="color: black; font-family: cambria math, cambria, sans-serif;">Welcome to Our Beauty Store</h1>
    </div>
  <div class="featured-products">
        <!-- Product 1 -->
        <div class="product">
            <img src="img/beauty_1.jpg" alt="Product 1">
            <p>Product ID: 1</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Set Fit Me 2 In 1 Face Powder & Liquid Foundation Xop Cosmetics Ph</h3>
            <p>₱19.99</p>
            <a href="add_cart.php?id=1&product=Set Fit Me 2 In 1 Face Powder & Liquid Foundation Xop Cosmetics Ph&price=19.99"><button>ADD TO CART</button></a>
        </div>

        <!-- Product 2 -->
        <div class="product">
            <img src="img/g.jpg" alt="Product 2">
            <p>Product ID: 2</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Waterproof Liquid Matte Lipstick Set Long Lasting Makeup Lip Gloss</h3>
            <p>₱1,000.99</p>
            <a href="add_cart.php?id=2&product= Waterproof Liquid Matte Lipstick Set Long Lasting Makeup Lip Gloss&price=29.99"><button>ADD TO CART</button></a>
        </div>

        <div class="product">
            <img src="img/makeup.jpg" alt="Product 3">
            <p>Product ID: 3</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">24Pc Makeup Set Kit for Women Makeup Gift Lip Gloss Concealer Eyeshadow Palette</h3>
            <p> ₱24.99</p>
            <a href="add_cart.php?id=3&product=24Pc Makeup Set Kit for Women Makeup Gift Lip Gloss Concealer Eyeshadow Palette&price=24.99"><button>ADD TO CART</button></a>
        </div>
         <div class="product">
            <img src="img/eye.jpg" alt="Product 3">
            <p>Product ID: 4</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Maybelline New York Sky High Mascara
</h3>
            <p> ₱34.99</p>
           <a href="add_cart.php?id=4&product=Maybelline New York Sky High Mascara&price=34.99"><button>ADD TO CART</button></a>
        </div>
        <div class="product">
            <img src="img/blush.jpg" alt="Product 3">
            <p>Product ID: 5</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">FLOWER Beauty Blush Bomb - Bubbly</h3>
            <p> ₱11.99</p>
             <a href="add_cart.php?id=5&product=FLOWER Beauty Blush Bomb - Bubbly&price=11.99"><button>ADD TO CART</button></a>
        </div>
           <div class="product">
            <img src="img/cream.jpg" alt="Product 3">
            <p>Product ID: 6</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Anti-Aging Cream</h3>
            <p> ₱70.00</p>
          <a href="add_cart.php?id=6&product=Anti-Aging Cream&price=70.00"><button>ADD TO CART</button></a>
        </div>
        <div class="product">
            <img src="img/blush1.jpg" alt="Product 3">
            <p>Product ID: 7</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">e.l.f Monochromatic Multi-Stick</h3>
            <p> ₱10.00</p>
              <a href="add_cart.php?id=7&product=e.l.f Monochromatic Multi-Stick&price=10.99"><button>ADD TO CART</button></a>
        </div>
        <div class="product">
            <img src="img/nail.jpg" alt="Product 3">
            <p>Product ID: 8</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">MI FASHION 3D Shine Long Lasting Nail Polish Set Combo 15ml Each Pink, Wine Maroon, Tomato Red, Magenta (Pack of 4)</h3>
            <p> ₱24.99</p>
            <a href="add_cart.php?id=8&product=MI FASHION 3D Shine Long Lasting Nail Polish Set Combo 15ml Each Pink, Wine Maroon, Tomato Red, Magenta (Pack of 4)&price=24.99"><button>ADD TO CART</button></a>
        </div>
        <div class="product">
            <img src="img/sunscreen.jpg" alt="Product 3">
            <p>Product ID: 9</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Lotus Herbals Safe Sun Invisible Matte Gel Sunscreen SPF 50 PA+++ , For Men & Women, Non-Greasy, Suitable for Oily Skin, 100g,Orange</h3>
            <p> ₱24.99</p>
             <a href="add_cart.php?id=9&product=Lotus Herbals Safe Sun Invisible Matte Gel Sunscreen SPF 50 PA+++ , For Men & Women, Non-Greasy, Suitable for Oily Skin, 100g,Orange&price=24.99"><button>ADD TO CART</button></a>
        </div>
        <div class="product">
            <img src="img/lip.jpg" alt="Product 3">
            <p>Product ID: 10</p>
            <h3>Ever Belina Lip and Cheek Roller</h3>
            <p> ₱128.00</p>
        <a href="add_cart.php?id=10&product=Ever Belina Lip and Cheek Roller&price=24.99"><button>ADD TO CART</button></a>
    </div>
        <div class="product">
            <img src="img/th.jpg" alt="Product 3">
            <p>Product ID: 11</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Essence Extreme Shine Volume Lip gloss</h3>
            <p> ₱188.29</p>
            <a href="add_cart.php?id=11&product=Essence Extreme Shine Volume Lip gloss&price=188.29"><button>ADD TO CART</button></a>
        </div>
        <div class="product">
            <img src="img/d.jpg" alt="Product 3">
            <p>Product ID: 12</p>
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Clinique Stay-Matte Oil-Free Makeup Foundation</h3>
            <p> ₱2,699.37</p>
           <a href="add_cart.php?id=12&product=Clinique Stay-Matte Oil-Free Makeup Foundation&price=2,699.37"><button>ADD TO CART</button></a>
        </div>
        <div class="product">
            <img src="product3.jpg" alt="Product 3">
            <h3 style="color: black; font-family: cambria math, cambria, sans-serif;">Product 3</h3>
            <p> ₱24.99</p>
           <a href="add_cart.php?id=11&product=Essence Extreme Shine Volume Lip gloss&price=188.29"><button>ADD TO CART</button></a>
        </div>
    </div>

    

</body>
</html>
