<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>contacts</title>
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


                                    <div>contacts- <span>
                                            <?php
                                            session_start();
                                            $w_id = $_SESSION['w_id'];
                                            // Establish connection to the database
                                            $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

                                            // Query to count the number of notes
                                            $query_count = "SELECT COUNT(*) as contact_count FROM contact WHERE w_id = '$w_id'";
                                            $result_count = mysqli_query($conn, $query_count);

                                            // Fetch the count from the result
                                            $row_count = mysqli_fetch_assoc($result_count);
                                            echo $row_count['contact_count']; // Display the count
                                            ?>
                                        </span></div>
                                </div>

                                <div class="file_manager">

                                    <?php
                                    $w_id = $_SESSION['w_id'];
                                    include ("../../php/conn.php");

                                    $queary = "SELECT * FROM contact WHERE w_id = '$w_id'";

                                    $result = mysqli_query($conn, $queary);

                                    if (mysqli_num_rows($result) > 0) {


                                        while ($row = mysqli_fetch_array($result)) {

                                            ?>

                                            <div class="contact">
                                                <a class="link" href="conatct_detail.php?number=<?php echo $row['number'] ?>">
                                                    <div class="contact_name">
                                                        <?php echo $row['name'] ?>
                                                    </div>
                                                    <div class="contact_num">
                                                        <?php echo $row['number'] ?>
                                                    </div>
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
                                        <a class="link" href="conatct_action.html">
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