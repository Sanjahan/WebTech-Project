<?php

    require_once('../model/profile-model.php');
    require_once('../model/booked-posts-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    
    $user = getUserByID($_COOKIE["id"]);
    $result = getAllBookedPostsByID($_COOKIE["id"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Posts</title>
</head>
<body>
    <?php include('header.php') ?>
    <br><br>

    <h2 align="center">Booked Posts</h2>
    <br><br>
    <?php 

        if(mysqli_num_rows($result)>0){
        echo"<table align=\"center\" width=\"25%\" border=\"0\" cellspacing=\"0\" cellpadding=\"20\" style=\"background-color: #F9E79F;\">";

            while($row=mysqli_fetch_assoc($result)){

                $postID = $row['PostID'];
                $address = $row['Address'];
                $rent=$row['Rent'];
                $date = $row['PostDate'];
                $status=$row['Status'];
                $userInfo = getUserByID($row['UserID']);
                $username = $userInfo["Username"];

                echo"    
                <tr>
                    <td>
                        $address <br><br>
                        Rent: $rent <br><br>
                        $status <br><br>
                    </td>
                </tr>";

                echo "
                </td>
            </tr>
            <tr style=\"background-color: white;\">
                <td>&nbsp;</td>
            </tr>";
            }
        }else{
            echo"<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"20\">
            <tr>
                <td align=\"center\" colspan=\"2\">No Posts Available</td>
            </tr>
            </table>
            ";
        }
    ?>
</body>
</html>