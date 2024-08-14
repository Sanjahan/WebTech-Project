<?php
    session_start();
    require '../model/model.php';  

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = sanitize($_POST["id"]);

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        if (isset($_POST['id'])){
            
            if (getHotelInfo($id)){        
                header("Location: ../view/roomView.php");
                // echo $_SESSION["hotelName"];
                // echo "<br>";    
                // echo $_SESSION["roomType"];
                // echo "<br>";    
                // echo $_SESSION["price"];
                // echo "<br>";    
                // echo $_SESSION["hotelfacilities"];
                // echo "<br>";    
                // echo $_SESSION["hotelLocation"];
                // echo "<br>";    
                // echo $_SESSION["roomStatus"];
            }
        }
        else{
            echo "Don't get the id";
        }
    }
    else{
        echo "Can't post";
    }
?>