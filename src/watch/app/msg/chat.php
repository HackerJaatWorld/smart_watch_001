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
    <title>chat</title>
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
                                        name
                                    </div>
                                </div>

                                <div class="file_manager">


                                    <div class="sms" id="chat_box">

                                        <?php
                                        $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

                                        if (isset($_SESSION['current_num'])) {

                                            $num = $_GET['num'];

                                            $current_num = $_SESSION['current_num'];

                                            $outgoing_num = mysqli_real_escape_string($conn, $num);
                                            $incoming_num = mysqli_real_escape_string($conn, $current_num);
                                            $output = "";

                                            $sql = "SELECT * FROM messages WHERE (outgoing_num = '{$outgoing_num}' AND incoming_num = '{$incoming_num}')
            OR (outgoing_num = '{$incoming_num}' AND incoming_num = '{$outgoing_num}') ORDER BY id DESC";

                                            $query = mysqli_query($conn, $sql);
                                            if ($query) {
                                                $messages = [];
                                                if (mysqli_num_rows($query) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query)) {
                                                        $messages[] = $row;
                                                    }
                                                    // Reverse the order of messages
                                                    $messages = array_reverse($messages);
                                                    foreach ($messages as $row) {
                                                        if ($row['outgoing_num'] === $outgoing_num) { // sender
                                                            $output .= '<div class="incoming_msg">' . $row['msg'] . '</div>';
                                                        } else { // receiver
                                                            $output .= '<div class="outgoing_msg">' . $row['msg'] . '</div>';
                                                        }
                                                    }
                                                    echo $output;
                                                } else {
                                                    echo "No messages found";
                                                }
                                            } else {
                                                echo "Query execution failed: " . mysqli_error($conn);
                                            }
                                        } else {
                                            echo "User not logged in";
                                        }


                                        ?>

                                        <!-- <div class="incoming_msg">hy</div>
                                        <div class="outgoing_msg">hn</div> -->

                                    </div>
                                    <div class="chat_form">
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
                                        value="<?php echo $current_num ?>">


                                            <input hidden name="incoming_user" class="msg_sender_num"
                                                type="number" placeholder="Msg to" value="<?php echo $value ?>">
                                            <input type="text" name="msg" placeholder="sms">
                                            <button id="send_btn" type="submit">send</button>
                                        </form>
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
    <script src="msg.js"></script>



</body>

</html>