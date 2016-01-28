<?php
session_start();

// αν το όνομα χρήστη είναι 'admin' ανακατεύθυνση στη σελίδα του διαχειριστή
if ($_POST['name'] == 'admin') {
	header("Location: admin.php");
}

// για τους άλλους παίκτες
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
	
	// θέτει το επίπεδο που διάλεξε ο χρήστης
	if (isset($_POST['level'])) {
		$_SESSION['lives'] = $_POST['level'];
	}
	// αν δεν έγινε επιλογή επιπέδου, τότε θα παίξει με το δύσκολο επίπεδο
	else {
		$_SESSION['lives'] = 5;
	}
	
	$_SESSION['points'] = 0;
	header("Location: play.php");
}
?>