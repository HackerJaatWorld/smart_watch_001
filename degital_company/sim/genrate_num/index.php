<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sim</title>
    <style>
        .nums {
            width: 80%;
        }

        .num {
            width: 100%;
            height: 50px;
            background-color: gray;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px;
        }

        a {
            color: black;
            text-decoration: none;
            margin: 10px;
            background: #fff;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h2>active numbers</h2>
    <div class="nums">




        <?php

        include ("conn.php");
        $sql = "SELECT id, number FROM num WHERE status = 1";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="num">
                <div class="number">
                    <?php echo $row['number'] ?>
                </div>
                <div class="action">
                    <a href="active.php?id=<?php echo $row['id'] ?>">details</a>
                    <a href="delete.php?id=<?php echo $row['id'] ?>">delete</a>
                </div>
            </div>

            <?php
        }

        ?>



    </div>
    <h2>new numbers</h2>
    <div class="nums">


        <?php

        include ("conn.php");
        $sql = "SELECT id, number FROM num WHERE status = 0";

        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="num">
                <div class="number">
                    <?php echo $row['number'] ?>
                </div>
                <div class="action">
                    <a href="form.php?id=<?php echo $row['id'] ?>">active now</a>
                    <a href="delete.php?id=<?php echo $row['id'] ?>">delete</a>
                </div>
            </div>
            

            <?php
        }

        ?>
        <a style="background: green;" href="genrate_num.php">genrate new number</a>

    </div>
</body>

</html>