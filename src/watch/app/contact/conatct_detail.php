<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>contacts details</title>
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
                                    <div>contacts- <span>10</span>/<span>100</span></div>
                                </div>

                                <div class="file_manager">

                                    <?php

                                    include ("../../php/conn.php");

                                    $num = $_GET['number'];

                                    $queary = "SELECT * FROM contact WHERE number= $num";

                                    $result = mysqli_query($conn, $queary);

                                    while ($row = mysqli_fetch_array($result)) {

                                        ?>

                                        <div class="contact_details">
                                            <img src="../../svg/contacts.svg" alt="">
                                            <div>
                                                <?php echo $row['name'] ?>
                                            </div>
                                            <div>
                                                <?php echo $row['number'] ?>
                                            </div>
                                            <div class="contact_btns">
                                                <a href="#">
                                                    <img src="../../svg/phone.svg" alt="">
                                                </a>
                                                <a href="../msg/new_msg.php?num=<?php echo $row['number'] ?>">
                                                    <img src="../../svg/message.svg" alt="">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="contact_history">
                                            <div class="history_num">
                                                <div>634565677</div>
                                                <div>12:23 AM</div>
                                            </div>
                                            <div class="history_num">
                                                <div>634565677</div>
                                                <div>12:23 AM</div>
                                            </div>
                                            <div class="history_num">
                                                <div>634565677</div>
                                                <div>12:23 AM</div>
                                            </div>
                                            <div class="history_num">
                                                <div>634565677</div>
                                                <div>12:23 AM</div>
                                            </div>
                                            <div class="history_num">
                                                <div>634565677</div>
                                                <div>12:23 AM</div>
                                            </div>
                                            <div class="history_num">
                                                <div>634565677</div>
                                                <div>12:23 AM</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="file_action">
                                        <span>
                                            <a class="link" href="contact_option.php?number=<?php echo $num ?>">
                                                option
                                            </a>
                                        </span>
                                        <span>
                                            <a class="link" href="contact.php">
                                                back
                                            </a>
                                        </span>
                                    </div>
                                    <?php
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