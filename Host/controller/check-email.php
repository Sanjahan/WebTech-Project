<?php
include('../model/login-model.php');

if(isset($_POST['checkEmail'])){

    $email = $_POST['email'];
    if(isExistUser($email)) echo 'true';
    else echo 'false';
    
}

?>