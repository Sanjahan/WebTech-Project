<?php

    session_start();
    require_once('../model/login-model.php');

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0){

            header('location:../view/login.php?err=empty');
            return;

        }

        $status = login($email, $password);

        if($status!=false){

            $_SESSION["login"] = true;
            setcookie("id", $status['UserID'], time()+3600, "/");
            header('location:../view/home.php');

        }else header('location:../view/login.php?err=mismatch');
        
    }

?>