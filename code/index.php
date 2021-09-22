<?php
include("dbconn.php");

$query = "SELECT * FROM users";
$result = mysqli_query($conn,$query);

$emails = mysqli_fetch_all($result,MYSQLI_ASSOC);
print_r($emails);

 // sendgrid mail coding
?>
