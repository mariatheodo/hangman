<?php
include_once 'header.html';
include_once 'connect.php';
$delete = $_GET['game'];

$sql = "DELETE FROM games WHERE games.gid = '$delete'";
if (mysqli_query($conn, $sql)) {
	echo "<h3>Το παιχνίδι διαγράφηκε</h3>";
}
else {
	echo "<h3>Η διαγραφή δεν ολοκληρώθηκε με επιτυχία</h3>";
}
mysqli_close($conn);

?>

<form action="admin_games.php" method="POST">
	<input class="btn btn-default btn-lg" name="back" type="submit" value="Πίσω">
</form>