<?php

    require_once('../model/profile-model.php');
    require_once('../model/history-model.php');
    require_once('../model/post-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');
    

    //They can store small amounts of data (such as session IDs, preferences, or shopping cart items) on the user’s machine.
//Cookies are sent with each HTTP request, allowing the server to identify the user and provide personalized content.
    $user = getUserByID($_COOKIE["id"]);
    $result = getHistoryByID($_COOKIE["id"]);

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
    <?php 
        if(mysqli_num_rows($result)>0){
        echo"<table width=\"35%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"20\" style=\"background-color: #F9E79F;\">";

            while($row=mysqli_fetch_assoc($result)){

                $client = getUserByID($row['ClientID']);
                $name = $client["Fullname"];
                $post = getPostByID($row['PostID']);
                $address = $post["Address"];
                $days = $row['DaysSpent'];
                $earning = $row['Earning'];

                echo "    
                <tr>
                <td>Name = $name</td>
                </tr>
                
                <tr>
                <td>Spent days = $days</td>
                </tr>
                
                <tr>
                <td>Address = $address</td>
                </tr>
                
                <tr>
                <td>Total earning = $earning</td>
                </tr>";
            }
        }else{
            echo"<table width=\"70%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\" align=\"center\">
            <tr>
                <td align=\"center\">No History Available</td>
            </tr>";
        }
    ?>
</body>
</html>