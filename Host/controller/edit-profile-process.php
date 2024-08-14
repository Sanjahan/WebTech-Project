<?php 

    require_once('../model/edit-profile-model.php');
    require_once('../model/profile-model.php');
    require_once('../model/registration-model.php');

    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $id = $_COOKIE["id"];
    $row=  getUserByID($id);

    $fullname = sanitize($_POST['fullname']);
    $email = sanitize($_POST['email']);
    $username = sanitize($_POST['username']);

    if(empty($fullname)){
        header('location:../view/edit-profile.php?err=fullnameEmpty'); 
        exit();
    }
    if(empty($email)){
        header('location:../view/edit-profile.php?err=emailEmpty'); 
        exit();
    }
    if(empty($username)){
        header('location:../view/edit-profile.php?err=usernameEmpty'); 
        exit();
    }

    $namepart = explode(' ', $fullname);
    if(count($namepart) < 2) {
        header('location:../view/edit-profile.php?err=fullnameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        header('location:../view/edit-profile.php?err=fullnameInvalid'); 
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:../view/edit-profile.php?err=emailInvalid'); 
        exit();
    }
    if($email != $row['Email'] && uniqueEmail($email)==false){
        header('location:../view/edit-profile.php?err=emailExists'); 
        exit();
    }
    if (!preg_match("/^[a-zA-Z-']*$/", $username)){
        header('location:../view/edit-profile.php?err=usernameInvalid'); 
        exit();
    }
    
    
    if(editProfile($id, $fullname, $email, $username) === true){
        header('location:../view/edit-profile.php?success=changed'); 
        exit();
    }


?>