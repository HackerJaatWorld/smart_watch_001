<?php
session_start();
$w_id = $_SESSION['w_id'];
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the photo data from the POST request
    $photoData = $_POST['photoData'];

    // Decode the base64-encoded image data
    $decodedPhotoData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $photoData));

    // Define the directory where the photo will be stored

    $uploadDirectory = '../file/camera';

    // Create the directory if it doesn't exist
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Generate a unique filename for the photo
    $photoName = uniqid() . '.jpg';

    // Define the file path for the photo
    $filePath = $uploadDirectory . $photoName;

    // Store the photo in the defined directory
    file_put_contents($filePath, $decodedPhotoData);

    // Get photo metadata
    $photoSize = strlen($decodedPhotoData);
    list($photoWidth, $photoHeight) = getimagesize($filePath);
    $photoResolution = $photoWidth . 'x' . $photoHeight;

    $conn = mysqli_connect("localhost", "root", "", "watch_001") or die("error");


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert metadata into database
    $sql = "INSERT INTO files (name, size ,type,path,w_id ) VALUES ('$photoName', $photoSize, 'img', 'C://camera', '$w_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Photo uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();

    // Move the photo to a folder (you need to replace 'destination_folder' with your actual destination folder)
    $destinationFolder = '../file/camera/';
    if (!is_dir($destinationFolder)) {
        mkdir($destinationFolder, 0777, true);
    }
    rename($filePath, $destinationFolder . $photoName);
}