<?php
session_start();

if ($_GET['new'] == 'false') {
	include_once 'connect.php';
	$player = $_SESSION['player'];
	$points = $_SESSION['points'];
	$sql1 = "SELECT * FROM users WHERE user='$player';";
	$result = mysqli_query($conn, $sql1);
	$row = mysqli_fetch_assoc($result);
	$uid = $row['uid'];	
	$sql2 = "INSERT INTO games (uid, points) VALUES ('$uid', '$points');";
	mysqli_query($conn, $sql2);
	
	mysqli_close($conn);
	session_unset();
	session_destroy();
	header("Location: index.php");
}
else {
	unset($_SESSION['word']);
	header("Location: play.php");
}
?>