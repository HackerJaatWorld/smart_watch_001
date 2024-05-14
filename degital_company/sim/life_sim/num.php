<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nums</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>life sim open</h2>
    <div class="container">
        <form action="details.php" method="post">   
                <?php

                include ("conn.php");
                $sql = "SELECT id, number FROM num WHERE status = 0";

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <label for="<?php echo $row['number'] ?>"><?php echo $row['number'] ?></label>
                    <input type="radio" name="id" id="<?php echo $row['number'] ?>" value="<?php echo $row['id'] ?>">

                    <?php
                }

                ?>

            <button type="submit">submit</button>
        </form>
    </div>
</body>

</html>