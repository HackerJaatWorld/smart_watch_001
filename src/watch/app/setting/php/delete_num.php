<?php
session_start();
$w_id = $_SESSION['w_id'];
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");
$queary = "DELETE FROM sim WHERE w_id = '$w_id'";
mysqli_query($conn, $queary);
echo '<script> window.history.back();</script>';

