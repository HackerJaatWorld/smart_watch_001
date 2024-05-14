<?php
session_start();
$w_id = $_SESSION['w_id'];
$path = $_GET['path'];
$old_name = $_GET['name']; // Assuming this is the current name of the folder
$new_name = $_POST['new_name']; // Assuming this is the new name you want to set

$conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");

if (!empty($old_name) && !empty($new_name)) {
    // Check if the folder exists in the specified path with the old name
    $query = "SELECT * FROM files WHERE path = '$path' AND name = '$old_name' AND w_id = '$w_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) { // If folder exists, update its name
        $query = "UPDATE files SET name = '$new_name' WHERE path = '$path' AND name = '$old_name' AND w_id = '$w_id'";
        mysqli_query($conn, $query);

        echo "Folder renamed successfully!";
        header("location: ../file.php?path=$path");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Folder does not exist in this path.";
    }
}
