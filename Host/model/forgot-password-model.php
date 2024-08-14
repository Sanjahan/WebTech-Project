<?php

    require_once('database.php');
    
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

    function getUserByMail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from UserInfo where Email = ?");
        $sql -> bind_param("s", $email);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    function changePassword($id, $newpass){

        $con=dbConnection();
        $sql = $con -> prepare ("update UserInfo set Password = ? where UserID = ?");
        $sql -> bind_param("ss", $newpass, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }

?>