<?php

include_once 'header.html';
echo "<h2>Επεξεργασία λέξης</h2>";

$word = $_GET['word'];
$id = $_GET['id'];

if (isset($_POST['new'])) {
	update($_POST['new'], $id);

?>
<div class="row">
	<h3>Η λέξη ενημερώθηκε</h3>
</div>
<?php
}
else {
?>
<h3>Θέλεις να αλλάξεις τη λέξη <?php echo " ".$word.";"?></h3>
<form action="" method="POST">
	<div class="row">
		<div class="col-lg-6">
			<div class="input-group">
				<input class="form-control" type="text" name="new" value="<?php echo $word ?>">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit">OK</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
}
function update($new, $id) {
	include_once 'connect.php';
	$sql = "UPDATE words SET word = '$new' WHERE words.wid = '$id'";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}
?>
<form action="admin_words.php" method="POST">
	<input class="btn btn-default btn-lg" name="back" type="submit" value="Πίσω">
</form>