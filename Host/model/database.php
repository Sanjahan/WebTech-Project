<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'project');
    return $conn;
    
}

?>