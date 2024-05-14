<?php
session_start();
$w_id = $_SESSION['w_id'];
if(!$w_id){
    header("location: ../../index.php");
}
?>

<?php

$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

$w_id = $_SESSION['w_id'];


$query = "SELECT num FROM sim WHERE w_id = '$w_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['current_num'] = $row['num'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../scripts/css/style.css">
</head>

<body>

    <div class="watch_feeta">
        <div class="watch_body">
            <div class="camera">
                <div class="camera_lence"></div>
            </div>
            <div class="screen">
                <div class="home_screen">
                    <div class="status_bar">
                        <div class="status_time" id="status_bar_time"></div>
                        <div class="status_battery">
                            <div class="battery_box">
                                <div class="batterylevel" id="batteryLevel"></div>
                            </div>
                            <div class="status_battery_per" id="status_battery_per">10%</div>
                        </div>
                    </div>
                    <div class="main_screen" id="main_screen">

                        <a href="app/setting/setting.html">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/setting.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>setting</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/callculator/callculator.html">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/cal.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>callculator</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/call/call.html">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/call.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>dailer</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/contact/contact.php">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/contact.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>contact</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/camera/camera.php">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/camera.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>camera</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/clock/clock.html">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/clock.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>clock</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/msg/msg.php">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/msg.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>msg</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/file/file.php?path=C:/">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/files.png" alt="">
                                </div>
                                <div class="app_name">
                                    <span>files</span>
                                </div>
                            </div>
                        </a>
                        <a href="app/note/note.php">
                            <div class="app">
                                <div class="app_icon">
                                    <img class="icon" src="../watch/img/app_icon/">
                                </div>
                                <div class="app_name">
                                    <span>Notes</span>
                                </div>
                            </div>
                        </a>


                    </div>
                </div>
            </div>
            <div onclick="window.location.reload()" class="home_btn" id="home_btn">
                <div class="home_btn_gol"></div>
            </div>
        </div>
    </div>
    <script src="../../scripts/js/time.js"></script>
    <script src="../../scripts/js/home_btn.js"></script>
    <script src="../../scripts/js/home.js"></script>
    <script src="../../scripts/js/battery.js"></script>

    <script>
        var swich = localStorage.getItem('watch');
        if (swich == 'watch_off') {
            window.location.href = 'watch_home.html';
        }

    </script>
</body>

</html>