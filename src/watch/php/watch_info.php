<?php
session_start();

include ("conn.php");

$name = $_POST['name'];
$w_id = rand(11111, 99999);

$queary = "INSERT INTO users (name,watch_id) VALUE ('$name', '$w_id')";
mysqli_query($conn, $queary);
$_SESSION['w_id'] = $w_id;
$expiration_time = time() + (30 * 24 * 60 * 60); // One month in seconds
setcookie('w_id', $w_id, $expiration_time, '/'); // Adjust the path as needed
header("location: ../home.php");
exit();
