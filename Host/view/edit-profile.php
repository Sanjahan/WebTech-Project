<?php

    require_once('../model/profile-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);

    $fullnameMsg = $emailMsg =  $usernameMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'fullnameEmpty': {
            $fullnameMsg = "Fullname can not be empty.";
            break;
        }
        case 'emailEmpty': {
            $emailMsg = "Email can not be empty.";
            break;
        }
        case 'usernameEmpty': {
            $usernameMsg = "Username can not be empty.";
            break;
        }
        case 'fullnameInvalid': {
            $fullnameMsg = "Fullname must include First and Last name.";
            break;
        }
        case 'emailInvalid': {
            $emailMsg = "Email is not valid.";
            break;
        }
        case 'emailExists': {
            $emailMsg = "Email already exists.";
            break;
        }
        case 'usernameInvalid': {
            $usernameMsg = "Username is not valid.";
            break;
        }
    }
    }

    $success_msg = '';

    if (isset($_GET['success'])) {

        $s_msg = $_GET['success'];

        switch ($s_msg) {

            case 'changed': {

                $success_msg = "Information successfully updated.";
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
    <title>Edit Profile</title>
    <script src="javascript/script.js"></script>
</head>
<body>
    <?php include('header.php') ?>
    <br><br><br><br><br><br><br>
    <h2 align="center">Edit Profile</h2>
    <table width="21%" border="1px" cellspacing="0"  cellpadding="25" align="center" style="background-color: #F9E79F;">
        <tr>
            <td>
                <form method="post" action="../controller/edit-profile-process.php" onsubmit="return isValidEditProfile(this);">
                    Fullname
                    <input type="text" name="fullname" size="43px" value= "<?php echo "{$user['Fullname']}"; ?>">
                    <?php if (strlen($fullnameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $fullnameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="fullnameError"></font><br>
                    Email
                    <input type="email" name="email" size="43px" value= "<?php echo "{$user['Email']}"; ?>">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="emailError"></font><br>
                    Username
                    <input type="text" name="username" size="43px" value= "<?php echo "{$user['Username']}"; ?>">
                    <?php if (strlen($usernameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $usernameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" id="usernameError"></font><br>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <br>
                    <center><button>Save Changes</button></center>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>