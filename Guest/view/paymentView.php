<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="payymentCSS.css">
</head>
<body>

    <p>You have to make payment <?php echo "{$_SESSION["price"]}"; ?></p>
    <p><b>Customer email : </b><?php echo "{$_SESSION["email"]}"; ?></p>

    <form action="../controller/paymentControll.php" method="post" novalidate autocomplete="off">
        <div class="payment">
            <table>
                <tr>
                    <td><label for="number">Number</label></td>
                    <td> :   </td>
                    <td><input type="text" id="number" name="number" style="font-size: 25px;"></td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td><label for="money">Money</label></td>
                    <td> :   </td>
                    <td><input type="text" id="money" name="money" style="font-size: 25px;"></td>
                </tr>
            </table>
            <br><br>
            <button>Make payment</button>
        </div>

        
    <button><a href="roomView.php">Back</a></button>

    </form>
</body>
</html>