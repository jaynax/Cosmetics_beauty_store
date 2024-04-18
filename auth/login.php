<?php
    session_start();
    require_once('../config.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       $username = $_POST['username'] ? $_POST['username'] : '';
        $address = $_POST['address'] ? $_POST['address'] : '';
        $password = hash('md5', $_POST['password']) ? $_POST['password'] : '';

        $sqlquery = "SELECT * FROM Users WHERE username='$username' AND address='$address' AND password='$password'";

        $result = mysqli_query($conn, $sqlquery);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['isLogin'] = $user['id'];
            header('Location: ../home.php');
            exit();
        } else {
            $errmsg = 'Username or Address or Password is invalid!';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #87CEEB;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6 mt-3">
                <div class="card 5-4">
                    <main class="form-signin">
                        <h1 class="h3 text-center mt-3 mb-3">Sign In</h1>
                        <?php 
                            if (isset($errmsg)) {
                                echo '<div class="alert alert-danger" role="alert">' . $errmsg . '</div>';
                            }
                        ?>
                        <form action="" method="POST" id="loginForm">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <form action="" method="POST" id="loginForm">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="address" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Address</label>
                            </div>

                            <div class="form-floating mt-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="checkbox mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="rememberMeSwitch">
                                    <label class="form-check-label" for="rememberMeSwitch"> Remember me</label>
                                </div>
                            </div>
                            <button class="w-100 btn btn-primary" type="submit">Sign in</button>
                            <a href="../admin/admin.php" class="w-100 btn btn-success" type="submit" style="font-style: bold skyblue">ADMIN</a>
                            <a href="registration.php" class="w-100 btn btn-success" type="submit">Register Now</a>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("loginForm").addEventListener("submit", function() {
            // Display a notification when the form is submitted
            alert("You have successfully signed in!");
        });
    </script>
</body>
</html>
