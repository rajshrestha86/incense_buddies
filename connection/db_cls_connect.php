<?php


$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "ITECH3224_30119581";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection Failed: " . mysqli_connect_error());
/* Check connection */

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 


?>