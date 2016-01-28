<?php

session_start();

// αν ο παίκτης δεν θέλει να συνεχίσει το παιχνίδι
if ($_GET['new'] == 'false') {
	
	// σύνδεση στη βάση
	include_once 'connect.php';
	$player = $_SESSION['player'];
	$points = $_SESSION['points'];
	$sql1 = "SELECT * FROM users WHERE user='$player';";
	$result = mysqli_query($conn, $sql1);
	$row = mysqli_fetch_assoc($result);
	$uid = $row['uid'];	
	
	// ενημέρωση του πίνακα games
	$sql2 = "INSERT INTO games (uid, points) VALUES ('$uid', '$points');";
	mysqli_query($conn, $sql2);
	
	mysqli_close($conn);
	
	// καταστροφή του session
	session_unset();
	session_destroy();
	
	// επιστροφή στην αρχική σελίδα
	header("Location: index.php");
}

// αν ο παίκτης θέλει να συνεχίσει το παιχνίδι
else {
	// διαγράφεται η λέξη που έπαιζε ο παίκτης από τη σύνοδο και επιστρέφει στο παιχνίδι
	unset($_SESSION['word']);
	header("Location: play.php");
}
?>