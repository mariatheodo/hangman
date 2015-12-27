<?php
$servername = "localhost";
$username = "mis28";
$password = "j48d5ZZ8";
$dbname = "mis28";

$conn = mysqli_connect($servername, $username, $password, $dbname);		//γίνεται η σύνδεση με τη βάση
if (!$conn) {												
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8');
mysqli_query($conn, "SET NAMES 'utf8'");
?>
