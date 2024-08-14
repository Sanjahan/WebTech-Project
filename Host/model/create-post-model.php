<?php

    require_once('database.php');

    function createPost($address, $rent, $postDate, $userID, $status){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into Post values('', ?, ?, ?, ?, ?)");
        $sql -> bind_param("sssss", $address, $rent, $postDate, $userID, $status);

        if($sql -> execute()) return true;
        else return false;
        
    }


?>