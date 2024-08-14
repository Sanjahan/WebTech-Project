<?php
session_start();
require '../model/model.php'; 

if (!isset($_SESSION['email'])) {
    header("Location: ../view/loginView.php");
    exit();
}

$activeSection = isset($_GET['section']) ? $_GET['section'] : 'room';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paying Guest Management System</title>
    <link rel="stylesheet" href="dashboardCSS.css">

    <script type="text/javascript" src="update.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>Paying Guest Management System</h1>
            <nav>
                <ul>
                    <li><a href="?section=room">Rooms</a></li>
                    <li><a href="?section=history">History</a></li>
                    <li><a href="?section=report">Report</a></li>
                    <li><a href="?section=profile">Profile</a></li>
                    <li><a href="logout.php" id="logout-btn">Log out</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="room" <?php echo $activeSection == 'room' ? 'class="active"' : ''; ?>>
        <div class="container1" id = "room">
            <table class="table">
                <?php
                    $arr2 = getAllData();
                    $len = count($arr2);
                    for ($i = 0; $i < count($arr2); $i++){
                        echo "<tr>";
                            echo "<td>";                           

                            $_SESSION["id"] = $arr2[$i]["id"];
                            $_SESSION["hotelName"] = $arr2[$i]["hotelName"];
                            $_SESSION["roomType"] = $arr2[$i]["roomType"];
                            $_SESSION["price"] = $arr2[$i]["price"];
                            $_SESSION["hotelfacilities"] = $arr2[$i]["hotelfacilities"];
                            $_SESSION["hotelLocation"] = $arr2[$i]["hotelLocation"];
                            $_SESSION["roomStatus"] = $arr2[$i]["roomStatus"];

                                echo '<div class="data" style="background-color: aliceblue;">';
                                    echo '    <h2>' . $arr2[$i]["hotelName"] . '</h2>';
                                    echo '    <p>' . $arr2[$i]["id"] . '</p>';
                                    echo '    <p> <b>Room Type</b> : ' . $arr2[$i]["roomType"] . '</p>';
                                    echo '    <p> <b>Price</b> : ' . $arr2[$i]["price"] . '</p>';
                                    echo '    <p> <b>Location</b> : ' . $arr2[$i]["hotelLocation"] . '</p>';
                                    echo '    <p class="status">' . $arr2[$i]["roomStatus"] . '</p>';
                                    
                                    echo "<form action='../controller/bookRoomController.php' method='post'>
                                            <input type='hidden' name='id' value='" . $arr2[$i]["id"] . "'>
                                             <button>Book Now</button>" ."</form>";

                                echo '</div>';
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </section>

    <section id="history" <?php echo $activeSection == 'history' ? 'class="active"' : ''; ?>>
        <div class="container">
            <h2 style="text-align: center;">History</h2>
            <div class="card">
                <h3>Tenant 1</h3>
                <p>Name: John Doe</p>
                <p>Property: Property 2</p>
                <p>Rent Due: $800</p>
            </div>
            <div class="card">
                <h3>Tenant 2</h3>
                <p>Name: Jane Smith</p>
                <p>Property: Property 1</p>
                <p>Rent Due: $700</p>
            </div>
        </div>
    </section>

    <section id="report" <?php echo $activeSection == 'report' ? 'class="active"' : ''; ?>>
        <div class="container9">
            <form action="../controller/reportController.php" method="post" novalidate autocomplete="off">
                <div class="complaindiv">
                    <table>
                        <tr>
                            <td><label for="complainEmail">User Email</label></td>                        
                            <td> : </td>
                            <td><input type="text" id="complainEmail" name="complainEmail"></td>
                        </tr>
                        <tr>
                            <td><label for="complainRoomNumber">Room Number</label></td>                        
                            <td> : </td>
                            <td><input type="text" id="complainRoomNumber" name="complainRoomNumber"></td>                      
                        </tr>
                        <tr>
                            <td><label for="complain">Complain</label></td>                        
                            <td> : </td>
                            <td><textarea id="complain" name="complain" cols="45" rows="5"></textarea></td>
                        </tr>
                    </table>

                    <button>Submit</button>
                </div>
            </form>
        </div>
    </section>

    <section id="profile" <?php echo $activeSection == 'profile' ? 'class="active"' : ''; ?>>
        <div class="container">
            <p style="text-align: left; font-size: 28px; text-decoration-line: underline; font-weight: bold;">User Profile : <?php echo "{$_SESSION["userType"]}"; ?></p>
            <div style="text-align: right;">
                
                <button
                    style="background-color: #b30000;
                            color: #ffffff;
                            padding: 10px 20px;
                            border: none;
                            padding: 15px;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 18px;" onclick="loaddoc()">Update
                </button>
            </div>
            <hr>
            <div class="info" id="good">
                <div class="card display">
                    <table>
                        <tr>
                            <td class="tableData"><b>Name</b></td>
                            <td><?php echo "{$_SESSION["name"]}"; ?></td>
                        </tr>
                        <tr>
                            <td class="tableData"><b>Phone Number</b></td>
                            <td><?php echo "{$_SESSION["phone"]}"; ?></td>
                        </tr>
                        <tr>
                            <td class="tableData"><b>Email</b></td>
                            <td><?php echo "{$_SESSION["email"]}"; ?></td>
                        </tr>
                        <tr>
                            <td class="tableData"><b>Address</b></td>
                            <td><?php echo "{$_SESSION["address"]}"; ?></td>
                        </tr>
                        <tr>
                            <td class="tableData"><b>Password</b></td>
                            <td><?php echo "{$_SESSION["password"]}"; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        
        <p style="text-align: center; font-weight: bold; color: tomato; font-size: 18px;">
            <?php echo isset($_GET['err']) ? $_GET['err'] : ""; ?>
        </p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>Group-8</p>
        </div>
    </footer>
</body>
</html>
