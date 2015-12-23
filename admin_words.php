<?php
if (isset($_POST['back'])) {
	header("Location: admin_pages.php"); 
}

include_once 'header.html';
echo "<h2>Λίστα λέξεων</h2>";
include_once 'connect.php';
$a="COUNT(*)";															
							
	$count = "SELECT $a FROM words;";										

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




$sql2 = "SELECT wid, word FROM words ORDER BY wid LIMIT $offset, $limit;";						
$lines = mysqli_query($conn, $sql2); 
?>

<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Α/Α</th>
			<th>Λέξη</th>
			<th>Επεξεργασία</th>
			<th>Διαγραφή</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_assoc($lines)) {?>
				<tr>
					<td><?php echo $row['wid']; ?></td>
					<td><?php echo $row['word']; ?></td>
					<td><a href='edit_words.php?word=<?php echo $row['word']?>&id=<?php echo $row['wid']?>'>OK </a></td>
					<td><a href='delete_words.php?word=<?php echo $row['wid']?>'>OK </a></td>
				</tr>
		<?php }  ?>
	
	</tbody>
</table>
<?php
$next = $page + 1;
$last = $page - 1;
if ($page == 0) {
		if ($num > $limit) {
			echo "<a href='admin_words.php?page=".$next."'>Επόμενες ".$limit." λέξεις</a>";
		}
		else {}
	}
	else if ($page > 0 && $left > $limit) {
		echo "<a href='admin_words.php?page=".$last."'>Προηγούμενες ".$limit." λέξεις</a> | ";
		echo "<a href='admin_words.php?page=".$next."'>Επόμενες ".$limit." λέξεις</a>";
	}
	else if($left < $limit) {
		echo "<a href='admin_words.php?page=".$last."'>Προηγούμενες ".$limit." λέξεις</a>";
	}
	mysqli_close($conn);
?>
<br />

<form action="admin_words.php" method="POST">
	<input class="btn btn-default btn-lg" name="back" type="submit" value="Πίσω">
</form>
</div>
</div>
</body>
</html>