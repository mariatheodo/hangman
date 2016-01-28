<?php
//αν έχει πατηθεί το "back" τότε επιστρέφει στην σελίδα παιχνιδιού
if (isset($_POST['back'])) {
	header("Location: play.php"); 
} 

require 'header.html'; 	


echo "<h2>Λίστα παιχνιδιών</h2>";
//σύνδεση με τη βάση
include_once 'connect.php';
$a="COUNT(*)";															
										
$count = "SELECT $a FROM games;";										

$result = mysqli_query($conn, $count);								
$row = mysqli_fetch_assoc($result);
$num = $row[$a];
//σελιδοποίηση, 20 γραμμές ανά σελίδα
$limit = 20;
		
if(isset($_GET['page'])) {
	$page = $_GET['page'];
	$offset = $limit * $page ;
}
else {
	$page = 0;
	$offset = 0;
}
		
$left = $num - $offset;




$sql2 = "SELECT gid, user, points, time FROM games, users WHERE games.uid=users.uid ORDER BY gid LIMIT $offset, $limit;";						
$lines = mysqli_query($conn, $sql2); 
?>

<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Α/Α</th>
			<th>Όνομα παίκτη</th>
			<th>Σκορ</th>
			<th>Ώρα παιχνιδιού</th>
		</tr>
	</thead>
	<tbody>
		<!-- γεμίζει τις γραμμές του πίνακα -->
		<?php while($row = mysqli_fetch_assoc($lines)) {?>
		<tr>
			<td><?php echo $row['gid']; ?></td>
			<td><?php echo $row['user']; ?></td>
			<td><?php echo $row['points']; ?></td>
			<td><?php echo $row['time']; ?></td>
		</tr>
		<?php }  ?>
		
	</tbody>
</table>
<?php
//έλεγχος αριθμού σελίδας για δημιουργία κουμπιού "Επόμενο", "Προηγούμενο"
$next = $page + 1;
$last = $page - 1;
if ($page == 0) {
	if ($num > $limit) {
		echo "<a href='player_games.php?page=".$next."'><button class='btn btn-default'>Επόμενα παιχνίδια</button></a>";
	}
	else {}
}
else if ($page > 0 && $left > $limit) {
	echo "<a href='player_games.php?page=".$last."'><button class='btn btn-default'>Προηγούμενα παιχνίδια</button></a> | ";
	echo "<a href='player_games.php?page=".$next."'><button class='btn btn-default'>Επόμενα παιχνίδια</button></a>";
}
else if($left < $limit) {
	echo "<a href='player_games.php?page=".$last."'><button class='btn btn-default'>Προηγούμενα παιχνίδια</button></a>";
}
mysqli_close($conn);
?>
<br />

<a href="play.php"><button class="btn btn-default btn-lg">Πίσω</button></a>

<?php require 'footer.php'; ?>
