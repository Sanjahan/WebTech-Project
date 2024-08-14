<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="roomCSS.css">
</head>
<body>

    <div class="showForm">
        
        <h1><?php echo "{$_SESSION["hotelName"]}"; ?></h1>
        <p><b>Room Type : </b><?php echo "{$_SESSION["roomType"]}"; ?></p>
        <p><b>Price : </b><?php echo "{$_SESSION["price"]}"; ?></p>
        <p><b>Facilities : </b><?php echo "{$_SESSION["hotelfacilities"]}"; ?></p>
        <p><b>Location : </b><?php echo "{$_SESSION["hotelLocation"]}"; ?></p>
        <p><b>Status : </b><?php echo "{$_SESSION["roomStatus"]}"; ?></p>

        <button><a href="paymentView.php">Payment</a></button>
    </div>
    <br><br>
    <button><a href="dashboardView.php">Back</a></button>
</body>
</html>