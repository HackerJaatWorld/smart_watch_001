<?php

$id = $_GET['id'];
// Assuming $id is already defined
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

// Query to fetch the 'fav' value for the given note ID
$query_fav = "SELECT fav FROM notes WHERE id=$id";
$result_fav = mysqli_query($conn, $query_fav);
$row_fav = mysqli_fetch_assoc($result_fav);
$fav_value = $row_fav['fav'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>options</title>
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
                            <div class="file">

                                <div class="memory_status">
                                    <div>options</div>
                                </div>

                                <div class="file_manager">

                                    <div class="folder">
                                        <a href="delete.php?id=<?php echo $id ?>">
                                            delete note
                                        </a>
                                    </div>
                                    <div class="folder">

                                        <a href="fevirate.php?id=<?php echo $id ?>">
                                            <?php
                                            // Check if 'fav' is 0 or 1 and set link text accordingly
                                            if ($fav_value == 0) {
                                                echo "Favorite Note";
                                            } else {
                                                echo "Unfavorite Note";
                                            }
                                            ?>
                                        </a>

                                    </div>


                                </div>

                                <div class="file_action">
                                    <span>

                                    </span>
                                    <span onclick="window.history.back()">back</span>
                                </div>
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