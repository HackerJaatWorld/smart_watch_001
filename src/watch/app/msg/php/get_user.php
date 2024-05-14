<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

$w_id = $_SESSION['w_id'];


$query0 = "SELECT num FROM sim WHERE w_id = '$w_id'";
$result = mysqli_query($conn, $query0);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['current_num'] = $row['num'];
    }
}

$current_num = $_SESSION['current_num'];

$sql = "SELECT m.*, s.num AS incoming_num, (SELECT msg FROM messages WHERE incoming_num = m.incoming_num ORDER BY id DESC LIMIT 1) AS last_msg
        FROM messages m
        LEFT JOIN sim s ON m.incoming_num = s.num
        WHERE outgoing_num = '{$current_num}'
        GROUP BY m.incoming_num";

$query = mysqli_query($conn, $sql);

$output = "";

if ($query) {
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {

             $output .= '<div class="folder">
             <a href="chat.php?num='.$row['incoming_num'].'">' . $row['incoming_num'] . '</a>
             <div>' . $row['last_msg'] . '</div>
             <a class="f_dot" href="#"><img src="../../svg/dots-vertical.svg" alt=""></a>
             </div>';
        }
        echo $output;
    } else {
        // echo "No users";
        echo $current_num;
    }
} else {
    echo "Query execution failed: " . mysqli_error($conn);
}

