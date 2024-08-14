<?php
    session_start();
    require '../model/model.php';   

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $email = sanitize($_POST["email"]);
    $password = sanitize($_POST["password"]);

    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;

    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        $isValid = true;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $emailErrMsg = "";
        $passwordErrMsg = "";
        $errMsg = "";

        if (empty($email)) {
            $_SESSION['emailErrMsg'] = "**Please fill up the email";
            $isValid = false; 
        }
        else {
            $_SESSION['email'] = $email;
            $_SESSION['emailErrMsg'] = "";
        }

        if (empty($password)) {
            $_SESSION['passwordErrMsg'] = "**Please fill up the password";
            $isValid = false;
        }
        else {
            $_SESSION['password'] = $password;
            $_SESSION['passwordErrMsg'] = "";
        }

        if (isset($_POST["login"])){
            if ($isValid === true) {
                if (loginCondition($email, $password)) {
                    header("Location: ../view/dashboardView.php");
                }
                else {
                    $errMsg = "Username or password incorrect";
                    header("Location: ../view/loginView.php?err=" . $errMsg);
                }
            }
            else {
                header("Location: ../view/loginView.php");
            }
        }
        else{
            echo "Login failed";
        }

        // if (isset($_POST["login"])){

        //     if (!empty($_POST["email"]) and !empty($_POST["password"])){

        //         if (loginCondition($email, $password)){

        //             header("Location: ../view/dashboardView.php");
        //         }
        //         else{
        //             echo "Incorrect password and email";
        //             echo "<br><br>";
        //             echo "Email : {$_SESSION["email"]}";
        //             echo "<br>";
        //             echo "password : {$_SESSION["password"]}";
        //         }
        //     }
        //     else{
        //         echo "Fill up the password";
        //         echo "<br><br>";
        //         echo '<a href="../view/loginView.php">Back</a>';
        //     }
        // }
        // else{
        //     echo "Invalid Login";
        //     header("Location: ../view/loginView.php");
        // }
    }
    else{
        echo "Not a post methord";
    }
?>