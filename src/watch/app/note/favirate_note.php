<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>favirate notes</title>
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
                                    <div>favirate notes - <span>
                                            <?php
                                            session_start();
                                            $w_id = $_SESSION['w_id'];
                                            // Establish connection to the database
                                            $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

                                            // Query to count the number of notes
                                            $query_count = "SELECT COUNT(*) as note_count FROM notes WHERE fav = 1 AND w_id = '$w_id'";
                                            $result_count = mysqli_query($conn, $query_count);

                                            // Fetch the count from the result
                                            $row_count = mysqli_fetch_assoc($result_count);
                                            echo $row_count['note_count']; // Display the count
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="file_manager">

                                    <div class="notes">


                                        <?php
                                        session_start();
                                        $w_id = $_SESSION['w_id'];
                                        $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

                                        $query = "SELECT * FROM notes WHERE fav = 1 AND w_id= '$w_id'";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <div class="note">
                                                    <a href="display.php?id=<?php echo $row['id'] ?>">
                                                        <div class="note_text"><?php echo $row['note'] ?></div>
                                                    </a>
                                                    <div class="note_title">
                                                        <?php
                                                        $title = $row['title'];
                                                        $words = explode(' ', $title);
                                                        if (count($words) >= 2) {
                                                            echo $words[0] . ' ' . $words[1];
                                                        } else {
                                                            echo $title;
                                                        }
                                                        ?>
                                                        <a href="option.php?id=<?php echo $row['id'] ?>">
                                                            <img src="../../svg/heart.svg" alt="">
                                                            <img src="../../svg/dots-vertical.svg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <h4 style="text-align:center;">No favorite notes found</h4>
                                            <?php
                                        }
                                        ?>



                                    </div>


                                </div>

                                <div class="file_action">
                                    <span>
                                        <a class="link" href="note_action.html">
                                            option
                                        </a>
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