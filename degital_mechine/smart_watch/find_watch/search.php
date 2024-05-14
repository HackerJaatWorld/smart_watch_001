<?php
session_start();
$conn = mysqli_connect("localhost","root","","watch_001") or die("error");
$w_id = $_POST['id'];

$queary = "SELECT watch_id FROM users WHERE watch_id = '$w_id' ";
$result =  mysqli_query($conn, $queary);
if(mysqli_num_rows($result) > 0){
    $_SESSION['w_id'] = $w_id;
    $expiration_time = time() + (30 * 24 * 60 * 60); // One month in seconds
    setcookie('w_id', $w_id, $expiration_time, '/'); // Adjust the path as needed
}else{
    echo 'not found';
}
// header("location: ../home.php");
exit();