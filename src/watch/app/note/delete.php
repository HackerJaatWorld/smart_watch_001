<?php
session_start();
$w_id = $_SESSION['w_id'];
$conn = mysqli_connect("localhost","root","","watch_001") or die("error");

$id = $_GET['id'];

$queary = "DELETE FROM notes WHERE id= $id AND w_id = '$w_id'";

$result = mysqli_query($conn, $queary);

header("location: note.php");