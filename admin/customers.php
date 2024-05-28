<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
    <style>
        body{
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(../img/22.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Add this style for the background color of data cells */
        td {
            background-color: lightpink; /* Set the background color for data cells */
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        .dashboard-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .dashboard-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<center>
<h2>Customer Information</h2>
</center>
<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
    
    <?php
    // Include the database configuration file
    include "../config.php";

    // Fetch customers from the database
    $sql = "SELECT * FROM customers";
    $result = $conn->query($sql);

    // Check if there are any customers
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["fullname"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["phone_number"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>";
            echo "<form action='delete_customer.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'/>";
            echo "<button class='delete-btn' type='submit'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No customers found.</td></tr>";
    }

    // Close the database connection
    $conn->close();
    ?>
 
</table>
<br>
<center>
    <button class="dashboard-btn" onclick="window.location.href='dashboard.php'">Dashboard</button>
</center>
</body>
</html>
