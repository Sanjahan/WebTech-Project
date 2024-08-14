<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function loginCondition($email, $password){

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        echo"Connect the server.";
    }

    $sql = "SELECT name, phoneNumber, email, address, userType, password FROM users WHERE email=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $phone = $row["phoneNumber"];
        $email = $row["email"];
        $address = $row["address"];
        $userType = $row["userType"];
        $password = $row["password"];
        
        $_SESSION["name"] = $name;
        $_SESSION["phone"] = $phone;
        $_SESSION["email"] = $email;
        $_SESSION["address"] = $address;
        $_SESSION["userType"] = $userType;
        $_SESSION["password"] = $password;

        return true;
    }
    else {
        return false;
    }
}

function addNewUser($name, $phone, $email, $address, $userType, $password){
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (name, phoneNumber, email, address, userType, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $phone, $email, $address, $userType, $password);

    $result = $stmt->execute();

    if ($result) {
        echo "Record updated successfully";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "<br><br>";
        echo '<a href="../View/registration.php">Back</a>';
    }
}

function forgetPasswordCondition($email, $phone){

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, phoneNumber, email, address, userType, password FROM users WHERE email=? AND phoneNumber=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $phone);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {        
        return true;
    }
    else {
        return false;
    }    
}

function updateUser($password, $email) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET password=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $password, $email);

    $result = $stmt->execute();

    if ($result) {
        return true;
    }
    else {
        echo "Error updating record: " . $conn->error;
    }

}

function editOrUpdateUser($name, $phone, $email, $address, $password) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET name=?, phoneNumber=?, address=?, password=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $phone, $address, $password, $email);

    $result = $stmt->execute();

    if ($result) {
        return true;
    }
    else {
        echo "Error updating record: " . $conn->error;
    }

}

// for rooms

function getAllData(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, hotelName, roomType, price, hotelfacilities, hotelLocation, roomStatus, bookedBy FROM hotelroom";
    $result = $conn->query($sql);
    $arr1 = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            array_push($arr1, $row);
        }
    }
    return $arr1;
}

function getHotelInfo($id){
   
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, hotelName, roomType, price, hotelfacilities, hotelLocation, roomStatus, bookedBy FROM hotelroom WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        $id = $row["id"];
        $hotelName = $row["hotelName"];
        $roomType = $row["roomType"];
        $price = $row["price"];
        $hotelfacilities = $row["hotelfacilities"];
        $hotelLocation = $row["hotelLocation"];
        $roomStatus = $row["roomStatus"];
        $bookedBy = $row["bookedBy"];
        
        $_SESSION["id"] = $id;
        $_SESSION["hotelName"] = $hotelName;
        $_SESSION["roomType"] = $roomType;
        $_SESSION["price"] = $price;
        $_SESSION["hotelfacilities"] = $hotelfacilities;
        $_SESSION["hotelLocation"] = $hotelLocation;
        $_SESSION["roomStatus"] = $roomStatus;
        $_SESSION["bookedBy"] = $bookedBy;

        return true;
    }
    else {
        return false;
    }
}

function updateStatus($id, $status, $email) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE hotelroom SET roomStatus=?, bookedBy=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $status, $email, $id);

    $result = $stmt->execute();

    if ($result) {
        return true;
    }
    else {
        echo "Error updating record: " . $conn->error;
    }

}

function updateComplain($complainRoomNumber, $complain) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "project";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE hotelroom SET complain=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $complain, $complainRoomNumber);

    $result = $stmt->execute();

    if ($result) {
        return true;
    }
    else {
        echo "Error updating record: " . $conn->error;
    }

}

?>
