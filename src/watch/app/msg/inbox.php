<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>inbox</title>
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
                                    <div>
                                        unrean - 2
                                    </div>
                                </div>

                                <div class="file_manager" id="user_box">

                                    <div class="folder">
                                        
                                        <!-- <a href="chat.php?">57656567</a>
                                        <div>msg</div>
                                        <a class="f_dot" href="#"><img src="../../svg/dots-vertical.svg" alt=""></a> -->

                                    </div>
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
    <script src="get_user.js"></script>

</body>

</html>