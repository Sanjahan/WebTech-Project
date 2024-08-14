<?php

    require_once('database.php');
    
    function getAllPosts(){

        $con = dbConnection();
        $sql = "select * from Post order by PostID desc";

        $result = mysqli_query($con,$sql);

        return $result;
        
    }

    function getPostByID($id){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from Post where PostID = ? order by PostID desc");
        $sql -> bind_param("i", $id);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }


//Searching
    function searchPostByAddress($address){

        $con = dbConnection();
        $sql = "select * from Post, UserInfo where Post.UserID = UserInfo.UserID and Address like '%{$address}%';";

        $result = mysqli_query($con,$sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

?>