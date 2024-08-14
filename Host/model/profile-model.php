<?php

    require_once('database.php');
    
    function getUserByID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from UserInfo where UserID = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

?>