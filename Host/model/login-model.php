<?php

    require_once('database.php');

    $row;

    function login($email, $password){

        global $row;

        $con = dbConnection();
        $sql = $con -> prepare ("select * from UserInfo where email = ? and password = ?");
        $sql -> bind_param("ss", $email, $password);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;
        }
        else return false;

    }

    function isExistUser($email){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from UserInfo where Email = ?");
        $sql -> bind_param("s", $email);
        $sql -> execute();

        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count >= 1) return true;
        else return false;
        
    }

?>