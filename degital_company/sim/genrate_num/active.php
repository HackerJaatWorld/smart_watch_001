<?php

include ("conn.php");


$name = $_POST['name'];
$gender = $_POST['gender'];
$adharcard = $_POST['adharcard'];
$address = $_POST['address'];
$number = $_POST['number'];


 $sql = "UPDATE `num` SET `status`='1' WHERE number = '$number'";

 mysqli_query($conn, $sql);


 $queary = "INSERT INTO details (name,address,gender,adhar_card,number) 
 VALUE ('$name','$address','$gender', '$adharcard', '$number')";

 mysqli_query($conn, $queary);



