<?php
    session_start();
    require '../model/model.php';   

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function isValidEmail($email) {
        $pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
        return preg_match($pattern, $email);
    }

    function isValidPassword($password) {
        if (strlen($password) <= 4) {
            return false;
        }
    
        $pattern = "/[!@#$%^&*(),.?\":{}|<>]/";
        if (!preg_match($pattern, $password)) {
            return false;  
        }
    
        return true;
    }
    
    $name = sanitize($_POST["name"]);
    $phone = sanitize($_POST["phone"]);
    $email = sanitize($_POST["email"]);
    $userType = sanitize($_POST["userType"]);
    $address = sanitize($_POST["address"]);
    $password = sanitize($_POST["password"]);
    $confirmPassword = sanitize($_POST["confirmPassword"]);

    $_SESSION["Name"] = $name;
    $_SESSION["phone"] = $phone;
    $_SESSION["Email"] = $email;
    $_SESSION["Address"] = $address;
    $_SESSION["User"] = $userType;
    $_SESSION["Password"] = $password;

    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        $isValid = true;
        
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $userType = $_POST["userType"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $nameErrMsg = "";
        $phoneErrMsg = "";
        $emailErrMsg = "";
        $userTypeErrMsg = "";
        $addressErrMsg = "";
        $passwordErrMsg = "";
        $confirmPasswordErrMsg = "";
        $errMsg = "";

        // Name
        if (empty($name)) {
            $_SESSION['nameErrMsg'] = "**Please fill up the name";
            $isValid = false; 
        }
        else {
            $_SESSION['name'] = $name;
            $_SESSION['emailErrMsg'] = "";
        }

        //Phone number
        if (empty($phone)) {
            $_SESSION['phoneErrMsg'] = "**Please fill up the phone";
            $isValid = false; 
        }
        else {
            $_SESSION['phone'] = $phone;
            $_SESSION['phoneErrMsg'] = "";
        }

        // Email
        if (empty($email)) {
            $_SESSION['emailErrMsg'] = "**Please fill up the email";
            $isValid = false; 
        }
        else {
            $_SESSION['email'] = $email;
            $_SESSION['emailErrMsg'] = "";
        }

        // userType
        if (empty($userType)) {
            $_SESSION['userTypeErrMsg'] = "**Please fill up the User Type";
            $isValid = false; 
        }
        else {
            $_SESSION['userType'] = $userType;
            $_SESSION['userTypeErrMsg'] = "";
        }

        // address
        if (empty($address)) {
            $_SESSION['addressErrMsg'] = "**Please fill up the address";
            $isValid = false; 
        }
        else {
            $_SESSION['address'] = $address;
            $_SESSION['addressErrMsg'] = "";
        }
        
        // Password
        if (empty($password)) {
            $_SESSION['passwordErrMsg'] = "**Please fill up the password";
            $isValid = false;
        }
        else {
            $_SESSION['password'] = $password;
            $_SESSION['passwordErrMsg'] = "";
        }
        
        // confirmPassword
        if (empty($confirmPassword)) {
            $_SESSION['confirmPasswordErrMsg'] = "**Please fill up the Confirm Password";
            $isValid = false;
        }
        else {
            $_SESSION['confirmPassword'] = $confirmPassword;
            $_SESSION['confirmPasswordErrMsg'] = "";
        }

        if (isset($_POST["signUp"])){

            //if (!empty($_POST["name"]) and !empty($_POST["phone"]) and !empty($_POST["email"]) and !empty($_POST["address"]) and !empty($_POST["userType"]) and !empty($_POST["password"]) and !empty($_POST["confirmPassword"])){
            
            if ($isValid === true){

                
                if (isValidEmail($email)) {

                    if (isValidPassword($password)) {

                        if ($password === $confirmPassword){

                            addNewUser($name, $phone, $email, $address, $userType, $password);
                            
                            
                            $errMsg = "Registration Successful";
                            header("Location: ../view/loginView.php?err=" . $errMsg);
                        }
                        else{
                            $errMsg = "Password doesn't match";
                            header("Location: ../view/regView.php?err=" . $errMsg);
                        }
                    }
                    else{
                        $errMsg = "Password must be more than 4 characters long and include at least one special character.";
                        header("Location: ../view/regView.php?err=" . $errMsg);
                    }
                }
                else{
                    $errMsg = "Give the email properly";
                    header("Location: ../view/regView.php?err=" . $errMsg);
                }
            }
            else{
                header("Location: ../view/regView.php");
            }
        }
        else{
            $errMsg = "Invalid sign up";
            header("Location: ../view/regView.php?err=" . $errMsg);
        }
    }