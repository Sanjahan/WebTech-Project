<?php

    require_once('database.php');

    function changePassword($id, $newpass){

        $con=dbConnection();
        $sql = $con -> prepare ("update UserInfo set Password = ? where UserID = ?");
        $sql -> bind_param("ss", $newpass, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }

?>