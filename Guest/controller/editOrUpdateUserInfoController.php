<?php
    session_start();
    require '../model/model.php';   

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $name = sanitize($_POST["Uname"]);
    $phone = sanitize($_POST["Uphone"]);
    $email = sanitize($_POST["Uemail"]);
    $address = sanitize($_POST["Uaddress"]);
    $password = sanitize($_POST["Upassword"]);

    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        if(!empty($_POST["Uname"]) and !empty($_POST["Uphone"]) and !empty($_POST["Uemail"]) and !empty($_POST["Uaddress"]) and !empty($_POST["Upassword"])){

            if (isset($_POST["submit"])){
                if(editOrUpdateUser($name, $phone, $email, $address, $password)){
                    
                    $_SESSION["name"] = $name;
                    $_SESSION["phone"] = $phone;
                    $_SESSION["email"] = $email;
                    $_SESSION["address"] = $address;
                    $_SESSION["password"] = $password;
                    
                    header("Location: http://localhost/dashboard/WebTecCode/Guest/view/dashboardView.php?section=profile" . $errMsg);
                }
                else{
                    echo "Failed";
                }
            }
            else {
                $errMsg = "Submission failed";
                header("Location: http://localhost/dashboard/WebTecCode/Guest/view/dashboardView.php?section=profile" . $errMsg);
            }
        }
        else {
            $errMsg = "Fill up all the field";
            header("Location: http://localhost/dashboard/WebTecCode/Guest/view/dashboardView.php?section=profile" . $errMsg);
        }
    }
    else{
        echo "Login failed";
    }
?>