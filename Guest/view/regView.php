<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script type="text/javascript" src="regJS.js"></script>
    <link rel="stylesheet" href="regCSS.css">
</head>
<body>
    <div class="registration-container">
        <h2>Registration</h2>
        <form action="../controller/regController.php" method="post" novalidate autocomplete="off" onsubmit="return validateReg();">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
                <span id="error1"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['nameErrMsg']) ? $_SESSION['nameErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone">
                <span id="error2"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['phoneErrMsg']) ? $_SESSION['phoneErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <span id="error3"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['emailErrMsg']) ? $_SESSION['emailErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="userType">User Type</label>
                <select id="userType" name="userType">
                    <option value="guest">Guest</option>
                    <option value="host">Host</option>
                </select>
                <span id="error4"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['userTypeErrMsg']) ? $_SESSION['userTypeErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <textarea id="address" name="address"></textarea>
                <span id="error5"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['addressErrMsg']) ? $_SESSION['addressErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password">
                <span id="error6"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['passwordErrMsg']) ? $_SESSION['passwordErrMsg'] : ""; ?>
                </div>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="text" id="confirmPassword" name="confirmPassword">
                <span id="error7"></span>
                <div style="font-weight: bold; color: tomato; font-size: 16px;">
                    <?php echo isset($_SESSION['confirmPasswordErrMsg']) ? $_SESSION['confirmPasswordErrMsg'] : ""; ?>
                </div>
            </div>
            <button type="submit" name="signUp">Register</button>
            <div class="signin">
                Already a member? <a href="loginView.php">Sign in</a>
            </div>
        </form>

        <p style="text-align: center; font-weight: bold; color: tomato; font-size: 18px;">
            <?php echo isset($_GET['err']) ? $_GET['err'] : ""; ?>
        </p>
    </div>
</body>
</html>
