<?php

$error_msg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'notFound': {
        $error_msg = "Email does not exist in our database.";
        break;
      }
      case 'accessDenied': {
        $error_msg = "Please provide an email first.";
        break;
      }
    case 'empty': {
        $error_msg = "Email can not be empty.";
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
    <title>Forgot Password</title>
    <script src="javascript/script.js"></script>
    <script>
        
        function checkEmail(){

        let email = document.getElementById('email').value;
        if(email.length == 0) {
            document.getElementById('emailError').innerHTML = "";
            return;
        }

        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controller/check-email.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('checkEmail=true&email='+email);

        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == 'false'){
                    document.getElementById('emailError').innerHTML = "This email is not registered in our database.<br>";
                }
                else{
                    document.getElementById('emailError').innerHTML = "";
                }
            }
        }
        }
    </script>
</head>
<body>
<br><br><br><br><br><br><br>
    <table width="25%" border="1px" cellspacing="0" cellpadding="25" align="center" style="background-color: #F9E79F;">
        <tr>
            <td>
                <form method="post" action="../Controller/forgot-password-process.php" onsubmit="return isValidForgotPassword(this);">
                    <h3>Enter your account's E-mail address</h3> <br><br>
                    <div><span>Email</span></div>
                    <input type="email" name="email" id="email" size="43px" onclick="checkEmail()">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $error_msg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="emailError"></font><br>
                    <button name="submit">Continue</button>
                </form>
            </td>
        </tr>
    </table>

</body>
</html>