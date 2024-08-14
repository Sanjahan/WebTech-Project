<?php

    require_once('../model/profile-model.php');
    require_once('../model/notification-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);
    $result = getNotificationsByID($_COOKIE["id"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php include('header.php') ?>
    <br><br><br>

    <h2 align="center">Urgent Maintainance Request</h2>
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"35%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"20\" style=\"background-color: #F9E79F;\">";

            while($row=mysqli_fetch_assoc($result)){

                $notification=$row['Notification'];
                $date=$row['Date'];
                echo "    
                <tr><td>$notification</td>
                <td>$date</td>
                </tr>";

                echo "
                </td>
            </tr>
            <tr style=\"background-color: white;\">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>";
            }
        }else{
            echo"<table width=\"50%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td align=\"center\" colspan=\"2\">No Notifications Available</td>
            </tr>";
        }
    ?>
</body>
</html>