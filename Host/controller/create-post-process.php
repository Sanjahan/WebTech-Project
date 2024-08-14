<?php

require_once('../model/create-post-model.php');

function sanitize($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

}

if(isset($_POST['submit'])){

    $address = sanitize($_POST['address']);
    $rent = sanitize($_POST['rent']);
    $postDate = date("F j, Y");
    $userID = $_COOKIE["id"];
    $status = "Vacant";

    if(empty($address)){
        header('location:../view/create-post.php?err=addressEmpty'); 
        exit();
    }
    if(empty($rent)){
        header('location:../view/create-post.php?err=rentEmpty'); 
        exit();
    }
    if(!is_numeric($rent) || $rent <= 0) {
        header('location:../view/create-post.php?err=rentError'); 
        exit();
    }


    if(createPost($address, $rent, $postDate, $userID, $status)){
        header('location:../view/home.php?success=posted'); 
        exit();
    }
}
?>