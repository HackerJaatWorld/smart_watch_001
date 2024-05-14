<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../../../scripts/css/style.css">
    <script>
        function setCaretPosition(elemId, caretPos) {
            var elem = document.getElementById(elemId);

            if (elem !== null) {
                if (elem.createTextRange) {
                    var range = elem.createTextRange();
                    range.move('character', caretPos);
                    range.select();
                } else {
                    if (elem.selectionStart) {
                        elem.focus();
                        elem.setSelectionRange(caretPos, caretPos);
                    } else
                        elem.focus();
                }
            }
        }
    </script>
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
                                session_start();
                                $w_id = $_SESSION['w_id'];
                                $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

                                $id = $_GET['id'];

                                $queary = "SELECT * FROM notes WHERE id = $id AND w_id = '$w_id'";

                                $result = mysqli_query($conn, $queary);

                                if (mysqli_num_rows($result) > 0) {


                                    while ($row = mysqli_fetch_array($result)) {

                                        ?>


                                        <form action="update.php?id=<?php echo $row['id'] ?>" method="post">

                                            <input class="msg_sender_num" type="text" name="title" placeholder="title"
                                                value="<?php echo $row['title'] ?>">
                                            <textarea onclick="setCaretPosition('noteTextArea', this.selectionStart)"
                                                id="noteTextArea" name="note" class="msg_writer_box" cols="22" rows="7"
                                                placeholder="Enter new note"><?php echo $row['note'] ?></textarea>
                                            <div class="write_msg_option">
                                                <span>
                                                    <button style="background: none; border: none; cursor: pointer;"
                                                        type="submit">update</button>
                                                </span>
                                                <span>
                                                    <a class="link" href="note.php">
                                                        back
                                                    </a>
                                                </span>
                                        </form>

                                        <?php
                                    }
                                }

                                ?>

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