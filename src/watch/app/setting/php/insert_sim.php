<?php

session_start();
$w_id = $_SESSION['w_id'];
$number = $_POST['number'];

$conn = mysqli_connect("localhost", "root", "", "sim_number") or die(mysqli_connect_error());

$sql = "SELECT number FROM num WHERE number = '$number' && status = 1";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");
    $queary = "INSERT INTO sim (num,w_id) VALUE ('$number','$w_id')";
    mysqli_query($conn, $queary);
    echo '<script> window.history.back();</script>';
} else {
    echo '<script> alert("invaildi number"); window.history.back();</script>';
}
;
