<?php
    session_start();
    require '../model/model.php';   

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $phone = sanitize($_POST["phone"]);
    $email = sanitize($_POST["email"]);

    
    $_SESSION["phone"] = $phone;
    $_SESSION["email"] = $email;


    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        if (isset($_POST["submit"])){

            if (!empty($_POST["email"]) and !empty($_POST["phone"])){
                if (forgetPasswordCondition($email, $phone)){
                    echo $_SESSION["email"];
                    header("Location: ../View/passwordAndConPassView.php");
                }
                else{
                    echo "Incorrect email or phone number";
                    echo "<br><br>";
                    //echo '<a href="../view/forgetpassView.php">Back</a>';                    
                }
            }
        }
    }

?>