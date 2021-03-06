<?php
//αν έχει πατηθεί το "back" τότε επιστρέφει στην αρχική σελίδα του διαχειριστή
if (isset($_POST['back'])) {
	header("Location: admin_pages.php"); 
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
		
// 
if(isset($_GET['page'])) {
	$page = $_GET['page'];
	$offset = $limit * $page ;
}
// ξεκινάει από τη σελίδα 0
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
			<th>Διαγραφή</th>
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
				<!-- δημιουργία κουμπιών για διαγραφή παιχνιδιού -->
				<td><a href='delete_games.php?game=<?php echo $row['gid'] ?>&page=<?php echo $page?>'><button class="btn btn-default ">OK</button></a></td>
	
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
		echo "<a href='admin_games.php?page=".$next."'><button class='btn btn-default'>Επόμενα παιχνίδια</button></a>";
	}
	else {};
}
else if ($page > 0 && $left > $limit) {
	echo "<a href='admin_games.php?page=".$last."'><button class='btn btn-default'>Προηγούμενα παιχνίδια</button></a>  ";
	echo "<a href='admin_games.php?page=".$next."'><button class='btn btn-default'>Επόμενα παιχνίδια</button></a>";
}
else if($left < $limit) {
	echo "<a href='admin_games.php?page=".$last."'><button class='btn btn-default'>Προηγούμενα παιχνίδια</button></a>";
}
mysqli_close($conn);
?>
<br />

<a href="admin_pages.php"><button class="btn btn-default btn-lg">Πίσω</button></a>

<?php require 'footer.php'; ?>
