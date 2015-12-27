<?php
include_once 'header.html';
include_once 'connect.php';
$delete = $_GET['word'];
$page = $_GET['page'];

$sql = "DELETE FROM words WHERE words.wid = '$delete'";
if (mysqli_query($conn, $sql)) {
	echo "<h3>Η λέξη διαγράφηκε</h3>";
}
else {
	echo "<h3>Η διαγραφή δεν ολοκληρώθηκε με επιτυχία</h3>";
}
mysqli_close($conn);


?>

<a href="admin_words.php?page=<?php echo $page ?>"><button class="btn btn-default btn-lg">Πίσω</button></a>