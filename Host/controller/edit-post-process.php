<?php

require_once('../model/edit-post-model.php');

function sanitize($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

}

if(isset($_POST['submit'])){

    $address = sanitize($_POST['address']);
    $rent = sanitize($_POST['rent']);
    $postID = $_GET["id"];

    if(empty($address)){
        header('location:../view/edit-post.php?id='.$postID.'&&err=addressEmpty'); 
        exit();
    }
    if(empty($rent)){
        header('location:../view/edit-post.php?id='.$postID.'&&err=rentEmpty'); 
        exit();
    }
    if(!is_numeric($rent) || $rent <= 0) {
        header('location:../view/edit-post.php?id='.$postID.'&&err=rentError'); 
        exit();
    }

    if(editPost($postID, $address, $rent)){
        header('location:../view/home.php?success=updated'); 
        exit();
    }
    
}
?>