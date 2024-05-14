<?php
session_start();
$w_id = $_SESSION['w_id'];
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

$outgoing_num = mysqli_real_escape_string($conn, $_POST['outgoing_user']);
$incoming_num = mysqli_real_escape_string($conn, $_POST['incoming_user']);
$msg = mysqli_real_escape_string($conn, $_POST['msg']);

if (!empty($incoming_num) && !empty($msg)) {

    $query = "SELECT num FROM sim WHERE w_id = '$w_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            
        }

        $checknum = "SELECT num FROM sim WHERE num = '$incoming_num'";
        $result2 = mysqli_query($conn, $checknum);

        if (mysqli_num_rows($result2) > 0) {

            $insertQuery = "INSERT INTO messages (w_id,incoming_num, outgoing_num, msg, time) VALUES ('$w_id','$incoming_num', '$outgoing_num', '$msg', NOW())";
            if (mysqli_query($conn, $insertQuery)) {
                echo "done";
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }

        } else {
            echo 'num not found';
        }

    } else {
        echo "watch id not found";
        die();
    }

} else {
    echo "empty";
}
mysqli_close($conn);
