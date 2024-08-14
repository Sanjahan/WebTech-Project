<?php
    session_start();
    require '../model/model.php';   

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $password = sanitize($_POST["password"]);
    $CPassword = sanitize($_POST["CPassword"]);

    $_SESSION["password"] = $password;
    $_SESSION["CPassword"] = $CPassword;

    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        if (isset($_POST["submit"])){

            if (!empty($_POST["password"]) and !empty($_POST["CPassword"])){

                if ($password === $CPassword){                    

                    $email = $_SESSION["email"];

                    if (updateUser($password, $email)){

                        header("Location: ../view/loginView.php");
                    }
                    else{
                        echo "Incorrect password and email";
                        echo "<br><br>";
                        echo '<a href="../View/passwordAndConPassView.php">Back</a>';
                    }
                }
                else{
                    
                    echo $email;
                    echo "Password doesn't match";
                    echo "<br><br>";
                    echo '<a href="../View/passwordAndConPassView.php">Back</a>';
                }
            }
            else{
                echo "Fill up the password";
                echo "<br><br>";
                echo '<a href="../View/passwordAndConPassView.php">Back</a>';
            }
        }
        else{
            echo "Invalid Login";
            header("Location: ../view/passwordAndConPassView.php");
        }
    }
    else{
        echo "Not a post methord";
    }
?>