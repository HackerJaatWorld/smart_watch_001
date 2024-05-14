<?php
session_start();
if (isset($_COOKIE['w_id'])) {
    // Retrieve the value from the cookie
    $w_id = $_COOKIE['w_id'];

    // Set the session variable
    $_SESSION['w_id'] = $w_id;
    header("location: src/watch/home.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch</title>
    <link rel="stylesheet" href="scripts/css/style.css">
</head>

<body>
    <div class="watch_form">
        <form action="src/watch/php/watch_info.php" method="post">
            <input type="text" name="name" placeholder="enter your name">
            <button type="submit">submit</button>
        </form>
        <a style="margin-top: -50px;" href="../find_watch/find.php">loss watch ?</a>
    </div>
</body>

</html>