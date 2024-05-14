<?php

include("../../php/conn.php");
session_start();
$w_id = $_SESSION['w_id'];
$num = $_GET['number'];

$queary = "DELETE FROM contact WHERE number= $num AND w_id = '$w_id'";

$result = mysqli_query($conn, $queary);

header("location: contact.php");