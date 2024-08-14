<?php 

    require_once('../model/registration-model.php');

    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $fullname = sanitize($_POST['fullname']);
    $email = sanitize($_POST['email']);
    $securityQuestion = sanitize($_POST['securityq']);
    $securityQuestionAnswer = sanitize($_POST['securityqa']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $cpassword = sanitize($_POST['cpassword']);

    if(empty($fullname)){
        header('location:../View/registration.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../View/registration.php?err=emailEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../View/registration.php?err=usernameEmpty'); 
        exit();
    }
    if(empty($password)){
        header('location:../View/registration.php?err=passwordEmpty'); 
        exit();
    }
    if(empty($cpassword)){
        header('location:../View/registration.php?err=cpasswordEmpty'); 
        exit();
    }
    if(empty($securityQuestion)){
        header('location:../View/registration.php?err=securityQuestionEmpty'); 
        exit();
    }
    if(empty($securityQuestionAnswer)){
        header('location:../View/registration.php?err=securityQuestionAnswerEmpty'); 
        exit();
    }

    $namepart = explode(' ', $fullname);
    if(count($namepart) < 2) {
        header('location:../View/registration.php?err=fullnameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../View/registration.php?err=fullnameInvalid'); 
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:../View/registration.php?err=emailInvalid'); 
        exit();
    }
    if(uniqueEmail($email)==false){
        header('location:../View/registration.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../View/registration.php?err=usernameInvalid'); 
        exit();
    } 

    if (strlen($password) < 8){
        header('location:../View/registration.php?err=passwordInvalid'); 
        exit();
    }
    if ($password != $cpassword){
        header('location:../View/registration.php?err=passwordMismatch'); 
        exit();
    }
    
    
    $status = register($fullname, $email, $username, $password, $securityQuestion, $securityQuestionAnswer);
    if($status) header('location:../view/login.php?success=created');

?>