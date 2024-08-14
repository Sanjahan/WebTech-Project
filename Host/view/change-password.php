<?php

    require_once('../model/profile-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);

    $prevpasswordMsg = $passwordMsg = $cpasswordMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'prevpasswordEmpty': {
            $prevpasswordMsg = "Previous password can not be empty.";
            break;
        }
        case 'passwordEmpty': {
            $passwordMsg = "Password can not be empty.";
            break;
        }
        case 'cpasswordEmpty': {
            $cpasswordMsg = "Confirm password can not be empty.";
            break;
        }
        case 'passwordError': {
            $prevpasswordMsg = "Incorrect password.";
            break;
        }
        case 'invalid': {
            $passwordMsg = "Invalid password.";
            break;
        }
        case 'mismatch': {
            $cpasswordMsg = "Passwords do not match.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

        $s_msg = $_GET['success'];

        switch ($s_msg) {

            case 'updated': {

                $success_msg = "Password successfully updated.";
                break;

            }

        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <script src="javascript/script.js"></script>
</head>
<body>
    <?php include('header.php') ?>
    <br><br><br><br>
    <table width="21%" border="1px" cellspacing="0"  cellpadding="25" align="center" style="background-color: #F9E79F;">
        <tr>
            <td>
                <form method="post" action="../controller/change-password-process.php" onsubmit="return isValidChangePassword(this);">
                    Previous Password
                    <input type="password" name="prevpassword" id="prevpassword" size="43px">
                    <?php if (strlen($prevpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $prevpasswordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="prevpasswordError"></font><br>
                    New Password
                    <input type="password" name="password" id="password" size="43px">
                    <?php if (strlen($passwordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $passwordMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="passwordError"></font><br>
                    Confirm New Password
                    <input type="password" name="cpassword" id="cpassword" size="43px">
                    <?php if (strlen($cpasswordMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $cpasswordMsg ?></font>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="green" align="center"><?= $success_msg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="cpasswordError"></font><br><br>
                    <center><button name="submit">Change Password</button></center>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>