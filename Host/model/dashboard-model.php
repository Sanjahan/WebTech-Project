<?php

    require_once('database.php');

    function getPostByUserID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select COUNT(*) as post_count from Post where UserID = ?");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row["post_count"];
        
    }

    function getBookedPostByUserID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select COUNT(*) as booked_post_count from Post where UserID = ? and Status = 'Booked'");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row["booked_post_count"];
        
    }

    function getRevenuePerMonthByUserID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("select SUM(CAST(Rent AS DECIMAL(10,2))) AS revenue from Post where Status = 'Booked' and UserID = ?;");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row["revenue"];
        
    }


?>