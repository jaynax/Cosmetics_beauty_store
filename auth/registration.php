<?php
session_start();

include '../config.php';

$usernameErr = $fullnameErr = $addressErr = $phoneErr = $passwordErr = "";
$username = $fullname = $address = $phone_number = $password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validate fullname
    if (empty($_POST["fullname"])) {
        $fullnameErr = "Full name is required";
    } else {
        $fullname = $_POST["fullname"];
    }

    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = $_POST["username"];
    }

    // Validate address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = $_POST["address"];
    }

    // Validate phone number
    if (empty($_POST["phone_number"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone_number = $_POST["phone_number"];
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    // If all fields are filled, proceed with registration
    if (!empty($fullname) && !empty($username) && !empty($address) && !empty($phone_number) && !empty($password)) {
        // Hash the password using MD5
        $hashed_password = md5($password); // Use MD5 for password hashing

        // Prepare SQL query (using prepared statements to prevent SQL injection)
        $sqlquery = "INSERT INTO customers (fullname, username, address, phone_number, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sqlquery);
        mysqli_stmt_bind_param($stmt, "sssss", $fullname, $username, $address, $phone_number, $hashed_password);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['msg'] = 'Successfully registered. You can log in now!';
            echo "<script>
                    alert('Successfully registered. You can log in now!');
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 3000); // 3 seconds
                  </script>";
            exit;
        } else {
            $errmsg = 'Something went wrong. Please try again!';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-sm-6">
            <div class="card p-4">
                <h1 class="text-center mb-3">Registration Form</h1>
                <p style="color: blue;">Please fill in this form to create an account.</p>

                <?php
                if (isset($_SESSION['msg'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['msg'] . '</div>';
                    unset($_SESSION['msg']);
                }

                if (isset($errmsg)) {
                    echo '<div class="alert alert-danger" role="alert">' . $errmsg . '</div>';
                }
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="form-floating mb-3">
                        <span class="error" style="color: red;">* <?php echo $fullnameErr;?></span>
                        <input type="text" name="fullname" class="form-control" id="floatingFullname" placeholder="Full Name" value="<?php echo htmlspecialchars($fullname); ?>">
                        <label for="floatingFullname">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <span class="error" style="color: red;">* <?php echo $usernameErr;?></span>
                        <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>">
                        <label for="floatingUsername">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <span class="error" style="color: red;">* <?php echo $addressErr;?></span>
                        <input type="text" name="address" class="form-control" id="floatingAddress" placeholder="Address" value="<?php echo htmlspecialchars($address); ?>">
                        <label for="floatingAddress">Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <span class="error" style="color: red;">* <?php echo $phoneErr;?></span>
                        <input type="text" name="phone_number" class="form-control" id="floatingPhone" placeholder="Phone Number" value="<?php echo htmlspecialchars($phone_number); ?>">
                        <label for="floatingPhone">Phone Number</label>
                    </div>
                    <div class="form-floating mt-3">
                        <span class="error" style="color: red;">* <?php echo $passwordErr;?></span>
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-danger mt-3">Register</button>
                    <a href="../index.php" class="btn btn-danger mt-3">Back</a>
                    <div class="new-account mt-3">
                        Already have an account? <a href="login.php">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
