<?php

    require_once('database.php');

    function editPost($id, $address, $rent){

        $con = dbConnection();
        $sql = $con -> prepare ("update Post set Address = ?, Rent = ? where PostID = ?");
        $sql -> bind_param("sss", $address, $rent, $id);

        if($sql -> execute()===true) 
            return true;
        else 
            return false; 
        
    }


?>