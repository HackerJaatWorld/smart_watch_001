<?php
session_start();
$w_id = $_SESSION['w_id'];
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

$id = $_GET['id']; // Get the ID of the note to be updated

// Retrieve the current value of 'fav' field
$query_select = "SELECT fav FROM notes WHERE id=$id AND w_id = '$w_id'";
$result_select = mysqli_query($conn, $query_select);
$row = mysqli_fetch_assoc($result_select);
$current_fav_value = $row['fav'];

// Toggle the value of 'fav' field
$new_fav_value = ($current_fav_value == 1) ? 0 : 1;

// Update the note with the new 'fav' value
$query_update = "UPDATE notes SET fav=$new_fav_value WHERE id=$id AND w_id = '$w_id'";
mysqli_query($conn, $query_update);

header("location: note.php");