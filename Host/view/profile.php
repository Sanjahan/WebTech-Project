<?php

    require_once('../model/profile-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
</head>
<body>
    <?php include('header.php') ?>
    <table width="21%" border="0" cellspacing="0" cellpadding="20">
        <tr>
            <td>
                <a href="edit-profile.php">Edit Profile Information</a><br><br>
                <a href="change-password.php">Change Password</a>
            </td>
        </tr>
    </table>
    <br><br><br>
    <h2 align="center">My Profile</h2>
    <table width="21%" border="1px" cellspacing="0"  cellpadding="25" align="center" style="background-color: #F9E79F;">
        <tr>
            <?php
                echo "<td>
                    Fullname  : {$user['Fullname']} <br><br>
                    Email     : {$user['Email']} <br><br>
                    Username  : {$user['Username']} <br>
                </td>";

            ?>
        </tr>
    </table>
</body>
</html>