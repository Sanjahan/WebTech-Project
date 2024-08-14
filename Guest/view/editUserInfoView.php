<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="update.js"></script>

</head>
<body>
    <div class="showForm">
        <form action="../controller/editOrUpdateUserInfoController.php" method="post" novalidate autocomplete="off">
            <table style="width: 100%;">
                <tr>
                    <td class="tableData"><label for="Uname">Name</label></td>
                    <td><input type="text" id="Uname" name="Uname" value="<?php echo "{$_SESSION["name"]}"; ?>"></td>
                </tr>
                <tr>
                    <td class="tableData"><label for="Uphone">Phone Number</label></td>
                    <td><input type="text" id="Uphone" name="Uphone" value="<?php echo "{$_SESSION["phone"]}"; ?>"></td>
                </tr>
                <tr>
                    <td class="tableData"><label for="Uemail">Email</label></td>
                    <td><input type="text" id="Uemail" name="Uemail" value="<?php echo "{$_SESSION["email"]}"; ?>"></td>
                </tr>
                <tr>
                    <td class="tableData"><label for="Uaddress">Address</label></td>
                    <td><input type="text" id="Uaddress" name="Uaddress" value="<?php echo "{$_SESSION["address"]}"; ?>"></td>
                </tr>
                <tr>
                    <td class="tableData"><label for="Upassword">Password</label></td>
                    <td><input type="text" id="Upassword" name="Upassword" value="<?php echo "{$_SESSION["password"]}"; ?>"></td>
                </tr>
            </table>
            
            <button name="submit">Submit</button>

            <br><br>
        </form>
    </div>
</body>
</html>