<?php
include_once('dbcon.php');

$error = false;
if(isset($_POST['btn-register'])){
    
    $location = $_POST['location'];
    $location = strip_tags($location);
    $location = htmlspecialchars($location);

    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = htmlspecialchars($password);
    
    $city = $_POST['city'];
    $city = strip_tags($city);
    $city = htmlspecialchars($city);

    
    if(empty($location)){
        $error = true;
        $errorlocation = 'Please input location';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true;
        $errorEmail = 'Please a valid input email';
    }

    if(empty($password)){
        $error = true;
        $errorPassword = 'Please password';
    }elseif(strlen($password) < 6){
        $error = true;
        $errorPassword = 'Password must at least 6 characters';
    }

    
    $password = md5($password);

    
    if(!$error){
        $sql = "insert into tbl_location(location, email ,password,city)
                values('$location', '$email', '$password','$city')";
        if(mysqli_query($conn, $sql)){
            $successMsg = 'Register successfully. <a href="index.php">click here to login</a>';
        }else{
            echo 'Error '.mysqli_error($conn);
        }
    }

}

?>

<html>
<head>
<title>PHP Login & Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div style="width: 500px; margin: 50px auto;">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <center><h2>Register</h2></center>
                <hr/>
                <?php
                    if(isset($successMsg)){
                 ?>
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-info-sign"></span>
                            <?php echo $successMsg; ?>
                        </div>
                <?php
                    }
                ?>
                <div class="form-group">
                    <label for="location" class="control-label">Location</label>
                    <input type="text" name="location" class="form-control">
                    <span class="text-danger"><?php if(isset($errorlocation)) echo $errorlocation; ?></span>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
                </div>
                <div class="form-group">
                    <label for="city" class="control-label">City</label>
                    <input type="city" name="city" class="form-control" autocomplete="off">
                    <span class="text-danger"><?php if(isset($errorcity)) echo $errorcity; ?></span>
                </div>
                <div class="form-group">
                    <center><input type="submit" name="btn-register" value="Register" class="btn btn-primary"></center>
                </div>
                <hr/>
                <a href="index.php">Login</a>
            </form>
        </div>
    </div>
</body>
</html>