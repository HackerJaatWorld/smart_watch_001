<?php

include("../conn.php");
session_start();
$w_id = $_SESSION['w_id'];
$name = $_POST['name'];
$number = $_POST['number'];

$queary = "INSERT INTO contact (name,number,w_id) VALUE ('$name', '$number','$w_id')";
mysqli_query( $conn, $queary );

header("location: ../../app/contact/contact.php");