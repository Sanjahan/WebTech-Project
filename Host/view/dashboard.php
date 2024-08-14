<?php 

    require_once('../model/dashboard-model.php');

    session_start();
    if(!isset($_SESSION['login'])) header('location:login.php?err=unauthorized');

    $posts = getPostByUserID($_COOKIE['id']);
    $bookedPosts = getBookedPostByUserID($_COOKIE['id']);
    $revenuePerMonth = getRevenuePerMonthByUserID($_COOKIE['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<?php include('header.php') ?>
    <br><br><br><br><br><br><br>
    <table width="21%" border="1px" cellspacing="0"  cellpadding="25" align="center" style="background-color: #F9E79F;">
    <h2 align="center">Details</h2>    
    <tr>
            <td>
                Total Posts : <?php echo $posts ?> <br><br>
                Booked Posts : <?php echo $bookedPosts ?> <br><br>
                Total Revenue [Per Month] : <?php echo $revenuePerMonth ?>
            </td>
        </tr>
    </table>
</body>
</html>