<?php
session_start();
$w_id = $_SESSION['w_id'];
$path = $_GET['path'];

$delete_folder = $_GET['name'];


$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

if (!empty($delete_folder)) {

    // Check if the folder exists in the specified path
    $query = "SELECT * FROM files WHERE path = '$path' AND name = '$delete_folder' AND w_id = '$w_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) { // If folder exists, delete it

        $query = "DELETE FROM files WHERE path = '$path' AND name = '$delete_folder' AND w_id = '$w_id'";
        mysqli_query($conn, $query);

        echo "Folder deleted successfully!";
        header("location: ../file.php?path=$path");
    } else {
        echo "Folder does not exist in this path.";
    }
}
