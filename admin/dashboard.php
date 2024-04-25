<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetics Beauty Store Admin</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url(../img/beauty.jpg); /* Replace 'img/beauty.jpg' with the path to your image file */
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #333;
            color: #fff;
            width: 200px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 10px 20px;
            border-bottom: 1px solid #555;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a img {
            width: 30px; /* Adjust the width of the logo as needed */
            margin-right: 10px;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        header {
            margin-bottom: 20px;
              
        }

        .content main {
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li>
                    <a href="#">
                        <img src="../img/123.jpg" alt="Logo" style="border-radius: 100px;  width:100px; height: 100px;  box-shadow: 2px 2px 20px #00008b; margin-top: 30px; padding: 20px;"><!-- Replace 'img/logo.png' with the path to your logo file -->
                    </a>
                       <h1 style="padding-left: 5px;">COSMETICS</h1>
                </li>
             
                 <li><a href="#">Dashboard</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="index.php">Orders</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="../auth/login.php">logout</a></li>
            </ul>
        </nav>
        <div class="content">
            <header>
                <h1>Admin Dashboard</h1>
            </header>
            <main>
                <!-- Main content goes here -->
                <p>Welcome to the cosmetics beauty store admin dashboard!</p>
            </main>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
