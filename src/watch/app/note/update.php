<?php
session_start();
$w_id = $_SESSION['w_id'];
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

$id = $_GET['id']; // Get the ID of the note to be updated

$title = $_POST['title'];
$note = $_POST['note'];

$query = "UPDATE notes SET title='$title', note='$note' WHERE id=$id AND w_id = '$w_id'"; // Update the note with the provided ID
mysqli_query($conn, $query);

header("location: note.php");
