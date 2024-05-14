<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

if (isset($_SESSION['current_num'])) {
    
    $num = $_GET['num'];

    $current_num = $_SESSION['current_num'];

    $outgoing_user = mysqli_real_escape_string($conn, $username);
    $incoming_user = mysqli_real_escape_string($conn, $current_username);
    $output = "";

    $sql = "SELECT * FROM messages WHERE (outgoing_username = '{$outgoing_user}' AND incoming_username = '{$incoming_user}')
            OR (outgoing_username = '{$incoming_user}' AND incoming_username = '{$outgoing_user}') ORDER BY id DESC";

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
                if ($row['outgoing_username'] === $outgoing_user) { // sender
                   
                    if ($row['type'] == 'img') {

                        if ($row['like_msg'] == 0) {
                            $output .= '
                            <div class="outgoing_msg msg">
                                <a href="" class="img">
                                    <img ondblclick="likeMsg(event, ' . $row['id'] . ')" src="../img/' . $row['msg'] . '" alt="">
                                </a>
                            </div>';
                        } elseif ($row['like_msg'] == 1) {
                            $output .= '
                            <div class="outgoing_msg msg">
                            <a href="" class="img">
                            <img ondblclick="likeMsg(event, ' . $row['id'] . ')" src="../img/' . $row['msg'] . '" alt="">
                            </a>
                            <span><img class="like_msg_dp" src="../dp/dp.jpeg" alt=""> <img class="like_msg_dp" src="../dp/dp.jpeg" alt=""></span>
                            </div>';
                        }

                    } else {
                        if ($row['like_msg'] == 0) {
                            $output .= '<div ondblclick="likeMsg(event, ' . $row['id'] . ')" oncontextmenu="showContextMenu(event, ' . $row['id'] . ')" class="outgoing_msg msg">' . $row['msg'] . '</div>';
                        } elseif ($row['like_msg'] == 1) {
                            $output .= '<div ondblclick="likeMsg(event, ' . $row['id'] . ')" oncontextmenu="showContextMenu(event, ' . $row['id'] . ')" class="outgoing_msg msg">' . $row['msg'] . ' <span><img class="like_msg_dp" src="../dp/dp.jpeg" alt=""> <img class="like_msg_dp" src="../dp/dp.jpeg" alt=""></span> </div>';
                        }
                    }
                } else { // receiver
                    if ($row['type'] == 'img') {

                        if ($row['like_msg'] == 0) {
                            $output .= '
                            <div class="incoming_msg msg">
                                <a href="" class="img">
                                    <img ondblclick="likeMsg(event, ' . $row['id'] . ')" src="../img/' . $row['msg'] . '" alt="">
                                </a>
                            </div>';
                        } elseif ($row['like_msg'] == 1) {
                            $output .= '
                            <div class="incoming_msg msg">
                            <span><img class="like_msg_dp" src="../dp/dp.jpeg" alt=""> <img class="like_msg_dp" src="../dp/dp.jpeg" alt=""></span>
                                <a href="" class="img">
                                    <img ondblclick="likeMsg(event, ' . $row['id'] . ')" src="../img/' . $row['msg'] . '" alt="">
                                </a>
                            </div>';
                        }

                    } else {
                        if ($row['like_msg'] == 0) {
                            $output .= '<div ondblclick="likeMsg(event, ' . $row['id'] . ')" oncontextmenu="showContextMenu(event, ' . $row['id'] . ')" class="incoming_msg msg">' . $row['msg'] . '</div>';
                        } elseif ($row['like_msg'] == 1) {
                            $output .= '<div ondblclick="likeMsg(event, ' . $row['id'] . ')" oncontextmenu="showContextMenu(event, ' . $row['id'] . ')" class="incoming_msg msg">' . $row['msg'] . ' <span><img class="like_msg_dp" src="../dp/dp.jpeg" alt=""> <img class="like_msg_dp" src="../dp/dp.jpeg" alt=""></span> </div>';
                        }
                    }
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


