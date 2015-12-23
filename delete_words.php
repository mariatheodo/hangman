<?php
include_once 'header.html';
include_once 'connect.php';
$delete = $_GET['word'];

$sql = "DELETE FROM words WHERE words.wid = '$delete'";
if (mysqli_query($conn, $sql)) {
	echo "<h3>Η λέξη διαγράφηκε</h3>";
}
else {
	echo "<h3>Η διαγραφή δεν ολοκληρώθηκε με επιτυχία</h3>";
}
mysqli_close($conn);


?>

<form action="admin_words.php" method="POST">
	<input class="btn btn-default btn-lg" name="back" type="submit" value="Πίσω">
</form>