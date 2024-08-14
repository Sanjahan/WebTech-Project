<?php

    require_once('../model/profile-model.php');
    require_once('../model/post-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);

    $addressMsg = $rentMsg = '';

    if (isset($_GET['err'])) {

        $err_msg = $_GET['err'];
        
        switch ($err_msg) {

            case 'addressEmpty': {
                $addressMsg = "Address can not be empty.";
                break;
            }
            case 'rentEmpty': {
                $rentMsg = "Rent can not be empty.";
                break;
            }
            case 'rentError': {
                $rentMsg = "Invalid rent.";
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
    <title>Create Post</title>
    <script src="javascript/script.js"></script>
</head>
<body>
    <?php include('header.php') ?>
    <br><br><br><br>
    <table width="21%" border="1px" cellspacing="0"  cellpadding="25" align="center" style="background-color: #F9E79F;">
        <tr>
            <td>
                <form method="post" action="../controller/create-post-process.php" onsubmit="return isValidCreatePost(this);">
                    Address
                    <textarea name="address" id="address" cols=43 rows=5> </textarea>
                    <?php if (strlen($addressMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $addressMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="addressError"></font><br>
                    Rent <br>
                    <input type="text" name="rent" id="rent" size="43px">
                    <?php if (strlen($rentMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $rentMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="rentError"></font><br><br>
                    <center><button name="submit">Create Post</button></center>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>