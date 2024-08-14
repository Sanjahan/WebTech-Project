<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script type="text/javascript" src="loginJS.js"></script>
    <link rel="stylesheet" href="loginCSS.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../controller/loginController.php" method="post" novalidate autocomplete="off" onsubmit="return validate();">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>">
                <span id="error1"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['emailErrMsg']) ? $_SESSION['emailErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" style="font-size: 18px;">
                <span id="error2"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['passwordErrMsg']) ? $_SESSION['passwordErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="forgot-password">
                <a href="forgetpassView.php">Forgot password?</a>
            </div>
            <button type="submit" name="login">Login</button>
            <div class="signup">
                Not a member? <a href="regView.php">Sign up</a>
            </div>
        </form>

        <p style="text-align: center; font-weight: bold; color: tomato; font-size: 18px;">
            <?php echo isset($_GET['err']) ? $_GET['err'] : ""; ?>
        </p>

        <a href="http://localhost/dashboard/WebTecCode/margeView.php">Back</a>
    
    </div>
</body>
</html>
