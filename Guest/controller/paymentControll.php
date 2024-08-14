<?php
    session_start();
    require '../model/model.php';  

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $money = sanitize($_POST["money"]);
    $id = $_SESSION["id"];
    $status = "reserved";
    $email = $_SESSION["email"];

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        if($_SESSION["price"] === $money){
            updateStatus($id, $status, $email);
            header("Location: ../view/dashboardView.php");
        }
        else{
            header("Location: ../view/paymentView.php");
        }
    }

?>