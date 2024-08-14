<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="passwordAndConPassCSS.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Form</h2>
        <form action="../Controller/passwordAndConPassContoller.php" method="post" novalidate autocomplete="off">
            <div class="input-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password">
            </div>
            <div class="input-group">
                <label for="CPassword">Confirm Password</label>
                <input type="text" id="CPassword" name="CPassword">
            </div>
            <button type="submit" name="submit">Submit</button>    
            <a href="loginView.php" class="back-button">Cancel</a>
        </form>
    </div>
</body>
</html>
