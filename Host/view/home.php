<?php

require_once('../model/profile-model.php');
require_once('../model/post-model.php');

session_start();
if (!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');

$user = getUserByID($_COOKIE["id"]);
$result = getAllPosts();

$success_msg = '';

if (isset($_GET['success'])) {

    $s_msg = $_GET['success'];

    switch ($s_msg) {

        case 'posted': {

                $success_msg = "Posted.";
                break;
            }
        case 'updated': {

                $success_msg = "Updated.";
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
    <title>Home</title>

</head>

<body>
    <?php include('header.php') ?>
    <table width="21%" border="0" cellspacing="0" cellpadding="20" align="center">
        <tr>
            <td>
                <a href="create-post.php">Create a Post</a><br><br>
                <a href="dashboard.php">Dashboard</a><br><br>
                <a href="booked-posts.php">Booked Posts</a><br><br>
                <a href="history.php">History</a> <br><br>
                
                <br>
                
            </td>
        </tr>
    </table>

    <h1 align="left"> All Posts</h1>
    <?php if (strlen($success_msg) > 0) { ?>
        <br>
        <left>
            <font color="green" size=6><?= $success_msg ?></font>
        </left>
    <?php } ?>
    <br> <br>
    <?php


    if (mysqli_num_rows($result) > 0) {
        

        echo "<table width=\"40%\" border=\"0\" cellspacing=\"0\" cellpadding=\"20\" style=\"background-color: #F9E79F;\">";




        while ($row = mysqli_fetch_assoc($result)) {

            $postID = $row['PostID'];
            $address = $row['Address'];
            $rent = $row['Rent'];
            $date = $row['PostDate'];
            $status = $row['Status'];
            $userInfo = getUserByID($row['UserID']);
            $username = $userInfo["Username"];

            echo "    
                <tr>
                    <td>
                        <font size=6>$username</font>&nbsp;&nbsp;&nbsp;&nbsp;<font size=4>$date</font><br><br>
                        $address <br><br>
                        Rent: $rent <br><br>
                        $status <br><br>";
            if (($user["UserID"] == $row['UserID']) && ($status == 'Vacant')) echo "<a href=\"edit-post.php?id=$postID\">Edit Post</a>";

            "</td>
                </tr>";

            echo "
                </td>
            </tr>
            <tr style=\"background-color: white;\">
                <td>&nbsp;</td>
            </tr>";
        }
    } else {
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"20\">
            <tr>
                <td align=\"center\">No Posts Available</td>
            </tr>
            </table>
            ";
    }
    ?>
</body>

</html>