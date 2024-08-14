<?php
    session_start();
    require '../model/model.php';   

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $complainEmail = sanitize($_POST["complainEmail"]);
    $complainRoomNumber = sanitize($_POST["complainRoomNumber"]);
    $complain = sanitize($_POST["complain"]);

    $_SESSION["complainEmail"] = $complainEmail;
    $_SESSION["complainRoomNumber"] = $complainRoomNumber;
    $_SESSION["complain"] = $complain;

    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        if(!empty($_POST["complainEmail"]) and !empty($_POST["complainRoomNumber"]) and !empty($_POST["complain"])){
            updateComplain($complainRoomNumber, $complain);
            header("Location: ../view/dashboardView.php");
        }
        else {
            header("Location: ../view/dashboardView.php?section=report");
        }
    }

?>