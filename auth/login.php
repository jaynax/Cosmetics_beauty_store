<?php
session_start();
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Validate and sanitize user input
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0; // Assuming 'id' is an integer
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($id <= 0 || empty($password)) {
        $errmsg = 'Invalid ID or Password.';
    } else {
        // Fetch customer by ID from the database
        $sqlquery = "SELECT id, username, password FROM customers WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sqlquery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $customer = mysqli_fetch_assoc($result);
                $hashed_password = $customer['password'];

                // Verify hashed password
                if (md5($password) === $hashed_password) {
                    $_SESSION['isLogin'] = $customer['id'];
                    header('Location: ../home.php');
                    exit();
                } else {
                    $errmsg = 'Username or Password is invalid!';
                }
            } else {
                $errmsg = 'Customer not found!';
            }

            mysqli_stmt_close($stmt);
        } else {
            $errmsg = 'Database query error.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('../img/378483a28a563b9d5ab86019b09cbc87.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
        }
        .card {
            background: rgba(0, 0, 0, 0.75);
            padding: 2rem;
            border-radius: 10px;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        .form-floating > label {
            color: #aaa;
        }
        .form-floating > .form-control:focus ~ label {
            color: white;
        }
        .toggle-password {
            cursor: pointer;
            position: absolute;
            right: 1rem;
            top: 1rem;
            color: #aaa;
        }
        a {
            color: #17a2b8;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6 mt-3">
                <div class="card">
                    <main class="form-signin">
                        <h1 class="h3 text-center mt-3 mb-3">Sign In</h1>
                        <?php 
                            if (isset($errmsg)) {
                                echo '<div class="alert alert-danger" role="alert">' . $errmsg . '</div>';
                            }
                        ?>
                        <form action="" method="POST" id="loginForm">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="id" id="floatingId" placeholder="ID" required>
                                <label for="floatingId">ID</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="floatingUsername" placeholder="Username" required>
                                <label for="floatingUsername">Username</label>
                            </div>
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                                <span class="toggle-password" onclick="togglePasswordVisibility()">&#128065;</span>
                            </div>
                            <div class="checkbox mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="rememberMeSwitch">
                                    <label class="form-check-label" for="rememberMeSwitch"> Remember me</label>
                                </div>
                            </div>
                            <button class="w-100 btn btn-primary mb-3" type="submit">Sign in</button>
                            <div class="text-center">
                                <a href="forgot_password.php">Forgot password?</a>
                                <span> | </span>
                                <a href="registration.php">Register Now</a>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('floatingPassword');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        }
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            // Display a notification when the form is submitted
            alert("You have successfully signed in!");
        });
    </script>
</body>
</html>

