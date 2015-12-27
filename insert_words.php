<?php
$page = $_GET['page'];
include_once 'header.html';
echo "<h2>Εισαγωγή λέξης</h2>";

if (isset($_POST['new'])) {
	insert($_POST['new']);

?>
<div class="row">
	<h3>Η εισαγωγή της λέξης ολοκληρώθηκε</h3>
</div>
<?php
}
else {
?>
<h3>Ποιά λέξη θέλεις να εισάγεις;</h3>
<form action="" method="POST">
	<div class="row">
		<div class="col-lg-6">
			<div class="input-group">
				<input class="form-control" type="text" name="new">
				<div class="input-group-btn">
					<button class="btn btn-default" type="submit">OK</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
}
function insert($new) {
	include_once 'connect.php';
	$sql = "INSERT INTO words (word) VALUES ('$new')";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
}
?>
<a href="admin_words.php?page=<?php echo $page; ?>"><button class="btn btn-default btn-lg">Πίσω</button></a>