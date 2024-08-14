<?php

    require_once('database.php');

    function editProfile($id, $fullname, $email, $username){

        $con = dbConnection();
        $sql = $con -> prepare ("update UserInfo set Fullname = ?, Username = ?, Email = ? where UserID = ?");
        $sql -> bind_param("ssss", $fullname, $username, $email, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }


?>