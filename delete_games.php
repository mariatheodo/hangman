
<?php 
require 'header.html'; 
include_once 'connect.php';
$delete = $_GET['game'];
$page = $_GET['page'];
			
$sql = "DELETE FROM games WHERE games.gid = '$delete'";
if (mysqli_query($conn, $sql)) {
	echo "<h3>Το παιχνίδι διαγράφηκε</h3>";
}
else {
	echo "<h3>Η διαγραφή δεν ολοκληρώθηκε με επιτυχία</h3>";
}
mysqli_close($conn);
			
?>

<a href="admin_games.php?page=<?php echo $page ?>"><button class="btn btn-default btn-lg">Πίσω</button></a>

<?php require 'footer.php'; ?>
