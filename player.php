<?php
session_start();
if ($_POST['name'] == 'admin') {
	header("Location: admin.php");
}

else {
	include_once 'connect.php';
	$_SESSION['player'] = $_POST['name'];
	$player = $_SESSION['player'];
	$sql1 = "SELECT * FROM users WHERE user='$player';";
	$sql2 = "INSERT INTO users (user) VALUES ('$player');";
	$result = mysqli_query($conn, $sql1);
	
	if (mysqli_num_rows($result) < 1) {					//αν δεν υπάρχει ο χρήστης τον προσθέτω στη βάση
		mysqli_query($conn, $sql2);
	}
	
	mysqli_close($conn);
	if (isset($_POST['level'])) {
		$_SESSION['lives'] = $_POST['level'];
	}
	else {
		$_SESSION['lives'] = 5;
	}
	
	$_SESSION['points'] = 0;
	header("Location: play.php");
}
?>