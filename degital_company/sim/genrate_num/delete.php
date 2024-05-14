<?php

include("conn.php");

$num_id = $_GET["id"];

$sql = "DELETE FROM num WHERE id = '$num_id'";

mysqli_query($conn, $sql);
$sql_details = "DELETE FROM details WHERE id = '$num_id'";

mysqli_query($conn, $sql_details);

header("location: index.php");
