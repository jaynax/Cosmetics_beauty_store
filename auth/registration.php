<?php
	session_start();

	include '../config.php';

	$usernameErr = $addressErr = $passwordErr = "";
	$username = $address = $password = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (empty($_POST["username"])) {
    		$usernameErr = "username is required";
    	} else {
    		$username = ($_POST["username"]);
  		}
  		if (empty($_POST["address"])) {
    		$addressErr = "address is required";
    	} else {
    		$address = ($_POST["address"]);
  		}

  		if (empty($_POST["password"])) {
    		$passwordErr = "password is required";
    	} else {
    		$password = ($_POST["password"]);
  		}

  		
	}

	 if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['submit'])) {
        $username = $_POST['username'] ? $_POST['username'] : '';
        $address = $_POST['address'] ? $_POST['address'] : '';
        $password = hash('md5', $_POST['password']) ? $_POST['password'] : '';
		

		$sqlquery = "INSERT INTO Users(username, address, password) VALUES ('$username','$address', '$password')";
		$result = mysqli_query($conn, $sqlquery);
        


		if ($result) {
			$msg = 'Successfully registered. You can log in now!';
			header('location: home.php');
		} else {
			$errmsg = 'Something went wrong. Please try again!';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user | registration</title>
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
                            if (isset($msg)) {
                                echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
                            }
                        ?>
                        <?php
                            if (isset($errmsg)) {
                                echo '<div class="alert alert-danger" role="alert">' . $errmsg . '</div>';
                            }
                        ?>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="form-floating mb-3">
                        	<span class="error" style="color: red;">* <?php echo $usernameErr;?></span>
                            <input type="username" name="username" class="form-control" id="floatingInput" placeholder="name@emaple.com" >
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                        	<span class="error" style="color: red;">* <?php echo $addressErr;?></span>
                            <input type="address" name="address" class="form-control" id="floatingInput" placeholder="name@emaple.com" >
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating mt-3">
                        	<span class="error" style="color: red;">* <?php echo $passwordErr;?></span>
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" >
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button href="login.php" class="btn btn-danger mt-3">register</a>
                        <a href="../index.php" class="btn btn-danger mt-3">Back</a>
                        <div class="new-account mt-3">
                            Do you have an account?
                            <a href="login.php">
                                Sign in
                            </a>
                        </div>
                    </form>
            	</div>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
</html>