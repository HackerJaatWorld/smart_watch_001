<?php
session_start();
$w_id = $_SESSION['w_id'];
$create_folder = $_POST['create_folder'];
$path = $_GET['path'];
$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

if (!empty($create_folder)) {

    // Check if the folder with the same name already exists in the same path
    $query = "SELECT * FROM files WHERE path = '$path' AND name = '$create_folder' AND w_id = '$w_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) { // If folder doesn't exist, create it

        $query = "INSERT INTO files (name, type, path,w_id) VALUES ('$create_folder', 'folder', '$path','$w_id')";
        mysqli_query($conn, $query);
        header("location:../file.php?path=$path");
    }
}
