<?php

    require_once('database.php');

    function register($fullname, $email, $username, $password, $securityQuestion, $securityQuestionAnswer){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into UserInfo values('', ?, ?, ?, ?, ?, ?)");
        $sql -> bind_param("ssssss", $fullname, $email, $username, $password, $securityQuestion, $securityQuestionAnswer);

        if($sql -> execute()) return true;
        else return false;
        
    }

    function uniqueEmail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("select email from userinfo where email = ? ");
        $sql -> bind_param("s", $email);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count > 0) return false;
        else return true; 
        
    }


?>