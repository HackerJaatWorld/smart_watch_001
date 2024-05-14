<?php
session_start();
$w_id = $_SESSION['w_id'];
$conn = mysqli_connect("localhost","root","","watch_001") or die("error");

$title = $_POST['title'];
$note = $_POST['note'];

if(!empty($title) && !empty($note)){
    $queary = "INSERT INTO notes (title,note,w_id) VALUE ('$title', '$note','$w_id')";
    mysqli_query( $conn, $queary );
}elseif(!empty($note)){
    $day = date('d');
    $month = date('m');
    $year = date('y');
    $date = $day . $month  . $year ;
    $queary = "INSERT INTO notes (title,note,w_id) VALUE ($date, '$note','$w_id')";
    mysqli_query( $conn, $queary );
}

header("location: note.php");