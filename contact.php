<?php
include "config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_id = $_POST["customer_id"];
    $message = $_POST["message"];

    // Prepare SQL statement to insert data into the 'contact' table
    $sql = "INSERT INTO concern (customer_id, message) VALUES (?, ?)";

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $customer_id, $message);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        // Insertion successful
        echo "<script>alert('Your concern has been submitted successfully. Thank you for your concern with our cosmetics store system.');</script>";
    } else {
        // Insertion failed
        echo "<script>alert('Error: Unable to submit concern. Please try again later.');</script>";
    }
    $stmt->close();
    $conn->close();
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Cosmetics Beauty Store</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('img/beauty.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        header {
            background-color: lightpink;
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

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: lightpink;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>

    <header>
        <h1>Cosmetics Beauty Store</h1>
    </header>

    <nav>
        <a href="home.php">Home</a>
        <a href="#">Skincare</a>
        <a href="auth/login.php">Logout</a>
    </nav>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="customer_id">Customer ID:</label>
        <input type="text" id="customer_id" name="customer_id" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Submit</button>
    </form>

  
</body>
</html>
