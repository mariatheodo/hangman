<?php

include_once 'header.html';
echo "<h2>Λίστα παικτών</h2>";
include_once 'connect.php';
$a="COUNT(*)";															
							
	$count = "SELECT $a FROM users;";										

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




$sql2 = "SELECT uid, user FROM users ORDER BY uid LIMIT $offset, $limit;";						
$lines = mysqli_query($conn, $sql2); 
?>

<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Α/Α</th>
			<th>Όνομα παίκτη</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_assoc($lines)) {?>
				<tr>
					<td><?php echo $row['uid']; ?></td>
					<td><?php echo $row['user']; ?></td>
				</tr>
		<?php }  ?>
	
	</tbody>
</table>
<?php
$next = $page + 1;
$last = $page - 1;
if ($page == 0) {
		if ($num > $limit) {
			echo "<a href='admin_players.php?page=".$next."'>Επόμενοι ".$limit." παίκτες</a>";
		}
		else {}
	}
	else if ($page > 0 && $left > $limit) {
		echo "<a href='admin_players.php?page=".$last."'>Προηγούμενοι ".$limit." παίκτες</a> | ";
		echo "<a href='admin_players.php?page=".$next."'>Επόμενοι ".$limit." παίκτες</a>";
	}
	else if($left < $limit) {
		echo "<a href='admin_players.php?page=".$last."'>Προηγούμενοι ".$limit." παίκτες</a>";
	}
	mysqli_close($conn);
?>
<br />

<a href="admin_pages.php"><button class="btn btn-default btn-lg">Πίσω</button></a>
</form>
</div>
</div>
</body>
</html>