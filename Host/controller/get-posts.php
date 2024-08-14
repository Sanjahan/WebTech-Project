<?php 
    require('../model/post-model.php');

    if(isset($_GET['address'])){
        $result =  searchPostByAddress($_GET['address']);
        echo json_encode($result);
    }

?>



//JSON is a format for storing and transporting data.

//JSON is often used when data is sent from a server to a web page.

//Arrays in PHP will also be converted into JSON when using the PHP function json_encode()
