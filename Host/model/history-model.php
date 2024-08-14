<?php

    require_once('database.php');
    
    function getHistoryByID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from History where HostID = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
        
                //get_result() is a method used in conjunction with prepared statements in the MySQLi extension to retrieve the result set from a prepared statement execution. This method is typically used when you want to fetch results from a prepared statement and work with them further.
        $result = $sql -> get_result();
        return $result;
        
    }

?>