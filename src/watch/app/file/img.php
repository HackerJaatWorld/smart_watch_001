<?php
session_start();
$w_id = $_SESSION['w_id'];
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>perivew</title>
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
                                    <?php
                                    
                                    $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

                                    $queary = "SELECT * FROM files WHERE id = '$id' AND w_id = '$w_id'";

                                    $result = mysqli_query($conn, $queary);

                                    if (mysqli_num_rows($result) > 0) {


                                        while ($row = mysqli_fetch_array($result)) {

                                            ?>


                                            <div class="folder">

                                                <?php
                                               if ($row['type'] == 'img') {
                                                    ?>
                                                    <img style="width: 180px;" src="camera/<?php echo $row['name']?>" alt="">
                                                    <?php
                                                } elseif ($row['type'] == 'video') {
                                                    ?>
                                                    <img style="width: 13px;" src="../../svg/video.svg" alt="">

                                                    <?php
                                                } elseif ($row['type'] == 'song') {
                                                    ?>
                                                    <img style="width: 13px;" src="../../svg/music.svg" alt="">

                                                    <?php
                                                }
                                                ?>

                                                
                                            </div>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <h4 style="text-align:center;">Empty</h4>
                                        <?php
                                    }

                                    ?>



                                </div>

                                <div class="file_action">
                                    <span>

                                    </span>
                                    <span onclick="window.location.back()">back</span>
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