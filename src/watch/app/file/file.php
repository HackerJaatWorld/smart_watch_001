<?php
$current_path = $_GET['path'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title><?php echo $current_path ?></title>
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
                                    <div><?php echo $current_path ?></div>
                                </div>

                                <div class="file_manager">

                                    <?php
                                    session_start();
                                    $w_id = $_SESSION['w_id'];
                                    $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

                                    $queary = "SELECT * FROM files WHERE path = '$current_path' AND w_id = '$w_id' ORDER BY id DESC";

                                    $result = mysqli_query($conn, $queary);

                                    if (mysqli_num_rows($result) > 0) {


                                        while ($row = mysqli_fetch_array($result)) {

                                            ?>

                                            <div class="folder">

                                                <?php
                                                if ($row['type'] == 'folder') {
                                                    ?>
                                                    <img style="width: 13px;" src="../../svg/folder.svg" alt="">
                                                    <a href="file.php?path=<?php echo $current_path . '/' . $row['name'] ?>">
                                                        <?php echo $row['name'] ?>
                                                    </a>
                                                    <?php
                                                } elseif ($row['type'] == 'img') {
                                                    ?>
                                                    <img style="width: 13px;" src="../../svg/image.svg" alt="">
                                                    <a href="img.php?id=<?php echo $row['id']?>">
                                                        <?php echo $row['name'] ?>
                                                    </a>
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

                                                <a class="f_dot"
                                                    href="folder_option.php?path=<?php echo $current_path ?>&name=<?php echo $row['name'] ?>&id=<?php echo $row['id'] ?>">
                                                    <img src="../../svg/dots-vertical.svg" alt="">
                                                </a>
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
                                        <a class="link" href="file_option.php?path=<?php echo $current_path ?>">
                                            option
                                        </a>
                                    </span>
                                    <span></span>
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