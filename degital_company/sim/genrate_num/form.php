<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php

include ("conn.php");
$id = $_GET['id'];
$sql = "SELECT number FROM num WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);


?>

<body>
    <h2>life sim open</h2>
    <div class="container">
        <form action='active.php' method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter Name">
            <label for="name">Gender:- </label>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Other
            <label for="adharcard">Adharcard</label>
            <input type="text" name="adharcard" placeholder="Enter adharcard">
            <label for="address">Address</label>
            <input type="text" name="address" placeholder="Enter address">
            <label for="number">number</label>
            <input type="text" name="number"  value="<?php echo $row['number'] ?>">
            <button type="submit">submit</button>
        </form>
    </div>
</body>

</html>