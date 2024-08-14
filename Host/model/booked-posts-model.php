<?php

    require_once('database.php');
    
    function getAllBookedPostsByID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from Post where Status='Booked' and UserID = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        return $result;
        
    }

?>