<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="forgetpassCSS.css">
</head>
<body>
    <form action="../controller/forgetPasswordEmailCheckController.php" method="post" autocomplete="off" novalidate>
        <div class="container">
            <div class="forget-password-container">
                <h2>Forget Password</h2>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="input-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone">
                </div>
                <button type="submit" name="submit">Submit</button>
                <a href="loginView.php" class="back-button">Back to Login</a>
            </div>
        </div>
    </form>
</body>
</html>
