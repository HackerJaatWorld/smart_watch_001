<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>sim</title>
    <link rel="stylesheet" href="../../../../scripts/css/style.css">
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
                    <div class="main_screen">

                        <div class="app_box">
                            <div class="setting">

                                <?php
                                session_start();
                                $w_id = $_SESSION['w_id'];
                                $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");
                                $queary = "SELECT num FROM sim WHERE w_id = '$w_id'";
                                $result = mysqli_query($conn, $queary);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo ' <div>
                                        <span>' . $row['num'] . '</span>
                                        <a id="delete" href="php/delete_num.php">delete</a>
                                        </div>';
                                    }
                                } else {
                                    echo '
                                    <form action="php/insert_sim.php" method="post">
                                        <label for="sim_num">Sim Number</label>
                                        <input type="number" name="number" placeholder="Enter sim number">
                                        <button id="insert" type="submit">Insert</button>
                                        <span>no sim card </span>
                                    </form>
                                    ';
                                }

                                ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="home_btn" id="home_btn">
                <div onclick="homeBtn()" class="home_btn_gol"></div>
            </div>
        </div>
    </div>

    <script src="../../../../scripts/js/time.js"></script>
    <script src="../../../../scripts/js/battery.js"></script>
    <script src="../../../../scripts/js/power_btn.js"></script>

</body>

</html>