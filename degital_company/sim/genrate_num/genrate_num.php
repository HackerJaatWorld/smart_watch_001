<?php

include("conn.php");

// Seed the random number generator with the current timestamp
mt_srand(time());

// Generate a random number
$num = mt_rand(0000000000,9999999999);

// SQL query to insert the random number into the database
$query = "INSERT INTO num (number) VALUES ('$num')";

// Execute the query
$result = mysqli_query($conn, $query);

// Redirect to index.php
header("location: index.php");
