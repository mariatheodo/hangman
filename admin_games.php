<?php
if (isset($_POST['back'])) {
	session_unset();
	session_destroy();
	header("Location: admin_pages.php"); 
}
session_start();
include_once 'header.html';
echo "<h2>Λίστα παιχνιδιών</h2>";
include_once 'connect.php';
$a="COUNT(*)";															
							
	$count = "SELECT $a FROM games;";										

	$result = mysqli_query($conn, $count);								
	$row = mysqli_fetch_assoc($result);
	$num = $row[$a];
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
			<th>Διαγραφή</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_assoc($lines)) {?>
				<tr>
					<td><?php echo $row['gid']; ?></td>
					<td><?php echo $row['user']; ?></td>
					<td><?php echo $row['points']; ?></td>
					<td><?php echo $row['time']; ?></td>
					<td><a href='delete_games.php?game=<?php echo $row['gid'] ?>'>OK </a></td>

</form>
				</tr>
		<?php }  ?>
	
	</tbody>
</table>
<?php
$next = $page + 1;
$last = $page - 1;
if ($page == 0) {
		if ($num > $limit) {
			echo "<a href='admin_games.php?page=".$next."'>Επόμενα ".$limit." παιχνίδια</a>";
		}
		else {}
	}
	else if ($page > 0 && $left > $limit) {
		echo "<a href='admin_games.php?page=".$last."'>Προηγούμενα ".$limit." παιχνίδια</a> | ";
		echo "<a href='admin_games.php?page=".$next."'>Επόμενα ".$limit." παιχνίδια</a>";
	}
	else if($left < $limit) {
		echo "<a href='admin_games.php?page=".$last."'>Προηγούμενα ".$limit." παιχνίδια</a>";
	}
	mysqli_close($conn);
?>
<br />

<form action="admin_games.php" method="POST">
	<input class="btn btn-default btn-lg" name="back" type="submit" value="Πίσω">
</form>
</div>
</div>
</body>
</html>