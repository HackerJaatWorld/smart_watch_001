<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");
$w_id = $_SESSION['w_id'];
$query = "SELECT num FROM sim WHERE w_id = '$w_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $current_num = $row["num"];
} else {
    echo "Receiver not found";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>New Msg</title>
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
                        <!-- <div class="keyboard" id="keyboard"></div> -->
                        <div class="app_box">
                            <div class="msg">
                                <?php
                                $num = $_GET['num'];
                                $value = '';
                                if ($num) {
                                    $value = $num;
                                } else {
                                    $value = '';
                                }
                                ?>
                                <form id="send_sms">

                                    <input type="text" name="outgoing_user" hidden
                                        value="<?php echo $current_num = $row["num"]; ?>">

                                    <input name="incoming_user" class="msg_sender_num" type="number" placeholder="Msg to"
                                        value="<?php echo $value ?>">
                                    <textarea id="msg_feild" name="msg" class="msg_writer_box" cols="22" rows="7"
                                        placeholder="Enter new msg"></textarea>
                                    <div class="write_msg_option">
                                        <span>
                                            <button id="send_btn" type="submit">send</button>
                                        </span>
                                        <span>
                                            <a class="link" href="msg.html">
                                                back
                                            </a>
                                        </span>
                                </form>
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
    <script src="msg.js"></script>
    <script src="../../../../scripts/js/power_btn.js"></script>

</body>

</html>