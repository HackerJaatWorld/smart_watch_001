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
    <link rel="stylesheet" href="../hand_watch_001/scripts/css/style.css">
</head>

<body>
    <div class="watch_form">
        <form action="search.php" method="post">
            <input type="number" name="id" placeholder="enter your watch id">
            <button type="submit">submit</button>
        </form>
    </div>
</body>

</html>